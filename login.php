<?php

require_once 'core/init.php';

if (Input::exists()) {

    // Check the token is correct to protect against CSRF attacks
    if (Token::checkToken(Input::getInput('token'))) {


        $validate = new Validation();
        $validation = $validate->checkData($_POST, array(
            'username' => array('required' => 'true'),
            'password' => array('required' => 'true')
        ));
        if ($validate->checkPassed()) {
            // Log user in
            $user = new User();
            $login = $user->login(Input::getInput('username'), Input::getInput('password'));

            if ($login) {
                Redirect::redirectTo('home.php');
            }
        } else {
            foreach ($validation->displayErrors() as $error) {
                // DISPLAY ERRORS HERE!!

            }
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
    <link rel="stylesheet" href="styles/general-styles.css">
    <link rel="stylesheet" href="styles/general-styles-mobile.css">
    <link rel="stylesheet" href="styles/general-styles-tablet.css">
</head>

<body>
    <!-- Wrapper around the whole page, so we can apply styles to this rather than body -->
    <div class="user-form-wrapper">

        <div class="login-img-container">
            <img src="./assets/login-img.jpeg" alt="">
        </div>

        <div class="user-form-container">

            <img src="assets/illustrations/login-illustration.svg" alt="">
            <form method="POST">
                <input type="text" placeholder="Username" name="username">

                <input type="password" placeholder="Password" name="password">
                <div class="form-links">
                    <a href="under-construction.html">Forgotten Password</a>
                    <a href="sign-up.php">Sign Up</a>
                </div>
                <!-- Token protects against CSRF attacks -->
                <input type="hidden" name="token" value='<?php echo Token::createToken(); ?>'>
                <button>Sign in</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>