<?php

require_once "config/Database.php";

$username = '';
$usernameErr = '';

$password = '';
$passwordErr = '';

$repeatPass = '';
$repeatPassErr = '';

$securityAnswer = '';
$securityAnswerErr = '';

$db = new Database();
$conn = $db->connect();
// Check if POST request was made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Valdiate username 
    if (empty(trim($_POST['username']))) {
        $usernameErr = 'Please enter a username';
    } else {

        // Create a prepared statement to protect against SQL injection
        // We later bind ? to the username
        $sql = "SELECT id FROM users WHERE username = ?";
        // Check the statement prepares successfully
        if ($stmt = $conn->prepare($sql)) {

            // // This binds the username to the ? in the sql statement
            // // 's' stands for string
            $stmt->bind_param('s', $paramUsername);

            // // Remove whitespace before and after username
            $paramUsername = trim($_POST['username']);

            // // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $usernameErr = "Username has already been taken";
                } else {
                    $username = strip_tags(trim($_POST['username']));
                }
            } else {
            }

            $stmt->close();
        }
    }
    // // Validate password 
    if (empty(trim($_POST['password']))) {
        $passwordErr = 'Please enter a password';
    } elseif (strlen(trim($_POST['password'])) < 5) {

        $passwordErr = "Password needs to be at least 5 characters";
    } else {
        $password = strip_tags(trim($_POST['password']));

        // Validate the repeated password
        if (empty(trim($_POST['repeat-password']))) {
            $repeatPassErr = 'Please repeat your password';
        } else {
            $repeatPass = trim($_POST['repeatPassword']);
            if (empty($repeatPassErr) && ($password != $repeatPass)) {
                $repeatPassErr = 'Passwords do not match, please try again';
            }
        }

        // // Validate secuirty answer
        if (empty(trim($_POST['security-answer']))) {
            $securityAnswerErr = "Please enter a security answer";
            echo "<h1>ERROR</h1>";
        } else {
            $securityAnswer = strip_tags(trim($_POST['securityAnswer']));
        }

        // Check for any input errors before inserting data into the database
        if (empty($usernameErr) && empty($passwordErr) && empty($securityAnswerErr)) {


            // Prepare the insert statement
            $sql = "INSERT INTO `users`( `username`, `password`, `security_question`, `security_answer`) VALUES (?,?,?,?)";

            if ($stmt = $conn->prepare($sql)) {


                // Bind variables to the prepared statment 
                $stmt->bind_param("ssss", $paramUsername, $paramPass, $paramSecurityQ, $paramSecurityA);

                // Set the parameters
                $paramUsername = $username;

                // Hash the password so the users actual password isn't saved in a database, instead a hashed version is stored
                $paramPass = password_hash($password, PASSWORD_DEFAULT);

                if (isset($_POST['security-question'])) {
                    $paramSecurityQ = $_POST['security-question'];
                }

                if (isset($_POST['security-answer'])) {
                    $paramSecurityA = $_POST['security-answer'];
                }

                // Execute prepared statement
                if ($stmt->execute()) {

                    //
                } else {
                    // echo "<h1>errror</h1>";
                }
                $stmt->close();
            }
        }
        $conn->close();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Rights</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/responsive-mobile.css">
    <link rel="stylesheet" href="styles/responsive-tablet.css">
</head>

<body>
    <!-- Wrapper around the whole page, so we can apply styles to this rather than body -->
    <div class="user-form-wrapper">

        <div class="login-img-container">
            <img src="./assets/login-img.jpeg" class="signup-img">
        </div>
        <div class="user-form-container signup">
            <div class="signup-title">
                <h1>Sign Up</h1>
            </div>
            <img src="assets/illustrations/sign-up-img.svg" alt="">

            <!-- Sing up form -->
            <form method="POST" action="home.php">
                <input type="text" placeholder="Username" required name="username">

                <input type="password" placeholder="Password" required name="password">

                <input type="password" placeholder="Repeat Password" required name="repeat-password">


                <select name="security-question" required>
                    <!-- First option is the default
                         disabled means it cannot be selected by the user
                         hidden means it cannot be seen by the use
                    -->
                    <option selected="selected" disabled hidden>Security Question</option>
                    <option>Test quesion 1</option>
                    <option>Test quesion 2</option>
                </select>



                <input type="text" placeholder="Answer" required name="security-answer">
                <div class="form-links">
                    <p>Already signed up?</p>
                    <a href="login.php" class="sign-in-link">Sign in</a>
                </div>
                <button>Sign Up</button>
            </form>
        </div>


    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>