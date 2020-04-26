<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::checkToken(Input::getInput('token')))


        echo 'Ran';
    $validate = new Validation();

    // Checks the input fields against certain validation checks
    $validation = $validate->checkData($_POST, array(
        'username' => array(
            'name' => 'username',
            'required' => true,
            'min' => 3,
            'max' => 30,
            'unique' => 'users'
        ),
        'password' => array(
            'name' => 'password',
            'required' => true,
            'min' => 5
        ),
        'repeat-password' => array(
            'name' => 'repated password',
            'required' => true,
            'matches' => 'password'
        ),
        'security-answer' => array(
            'name' => 'security answer',
            'required' => true,
            'min' => 3
        ),

    ));
    if ($validation->checkPassed()) {
        $user = new User();
        try {
            $user->createUser(array(
                'username' => Input::getInput('username'),
                'password' => password_hash(Input::getInput('password'), PASSWORD_DEFAULT),
                'security_question' => Input::getInput('security-question'),
                'security_answer' =>  Input::getInput('security-answer'),
            ));
            Redirect::redirectTo('index.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        foreach ($validation->displayErrors() as $error) {
            // Displays the errros on the page
            // Look to change this depending on how we want the errors to appear
            echo $error;
        }
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
            <form method="POST" action="">
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
                <!-- Creates a token that is unique to the user, protects against CSRF attacks  -->
                <!-- This token is also set as a session to the user -->
                <input type="hidden" name="token" value=" <?php echo Token::createToken() ?>">
            </form>
        </div>


    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>