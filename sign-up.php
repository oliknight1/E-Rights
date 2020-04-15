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
    <div class="login-wrapper">
        <!-- Contains only the image shown on the left -->
        <div class="signup-form-container">

            <img src="assets/illustrations/sign-up-img.svg" alt="">
            <form method="POST">
                <input type="text" placeholder="Username">

                <input type="password" placeholder="Password">

                <input type="password" placeholder="Repeat Password">

                <select name="security-question" id="">

                    <option value="" selected="selected">Test quesion</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <input type="text" placeholder="Answer">
                <div class="form-links">
                    <a href="under-construction.html">Forgotten Password</a>
                    <a href="#">Sign Up</a>
                </div>
                <button>Sign in</button>
            </form>
        </div>

        <div class="login-img-container">
            <img src="./assets/login-img.jpeg" alt="">
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>