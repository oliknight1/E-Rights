<?php

if (isset($_POST["username"])) {
    echo "<script> console.log(true) </script>";
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
            <form method="POST">
                <input type="text" placeholder="Username" required name="username">

                <input type="password" placeholder="Password" required name="password">

                <input type="password" placeholder="Repeat Password" required>


                <select name="security-question" required>
                    <!-- First option is the default
                         disabled means it cannot be selected by the user
                         hidden means it cannot be seen by the use
                    -->
                    <option value="" selected="selected" disabled hidden> Security Question</option>
                    <option value="0">Test quesion 1</option>
                    <option value="1">Test quesion 1</option>
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