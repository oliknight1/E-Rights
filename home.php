<?php

require_once 'core/init.php';
$user = new User();

if (isset($_SESSION['user'])) {
    $user->findUser($_SESSION['user']);
} else {
    Redirect::redirectTo("login.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/responsive-tablet.css">
    <link rel="stylesheet" href="styles/responsive-mobile.css">
    <link rel="stylesheet" href="styles/general-styles.css">
    <link rel="stylesheet" href="styles/general-styles-mobile.css">
    <link rel="stylesheet" href="styles/general-styles-tablet.css">
    <script src="https://kit.fontawesome.com/96867cee00.js"></script>
</head>

<body>
    <nav>
        <!-- Hamburger Menu -->

        <!-- Button that the user clicks -->
        <i class="fas fa-bars" id="open-menu"></i>

        <!-- Menu with links -->
        <div class="hamburger-menu">
            <header>
                <p> Hi <?php echo $user->getData()['username'] ?>!</p>
                <i class="fas fa-times" id="close-menu"></i>
            </header>
            <ul>
                <li>
                    <a href="home.php">
                        <div class="icon-container">
                            <i class="fas fa-home"></i>
                        </div>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="courses.php">
                        <div class="icon-container">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <p>All Courses</p>
                </li>
                </a>
                <li>
                    <a href="my-learning.php">
                        <div class="icon-container">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <p> My Learning</p>
                    </a>
                </li>
                <li>
                    <a href="account.php">
                        <div class="icon-container">
                            <i class="fas fa-user"></i>
                        </div>
                        <p>Account</p>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Navbar -->
        <a href="home.php">
            <img src=assets/logo/logo-horizontal-2.svg alt="Site Logo">
        </a>

        <div class="link-container">
            <a href="home.php">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="courses.php">
                <i class="fas fa-book-open"></i>
                <p>All Courses</p>
            </a>
            <a href="my-learning.php">
                <i class="fas fa-graduation-cap"></i>
                <span>My Learning</span>
            </a>
            <a href="account.php">
                <i class="fas fa-user"></i>
                <span>Account</span>
            </a>
        </div>

    </nav>
    <div class="home-info-container">
        <div class="home-info-text-container">

            <div class="home-info-text-title">
                <p>Hi <?php echo $user->getData()['username'] ?>!</p>
            </div>
            <div class="home-info-text-content">
                Welcome to E-Rights home, you can access all of your assignment and outstanding tasks here.
            </div>

        </div>
        <div class="home-info-profile-container">
            <div class="profile-icon-container">
                <div class="profile-icon">
                    <?php echo strtoupper($user->getData()['username'][0]) ?>
                </div>
            </div>

            <div class="home-info-profile-content">

                <div class="home-info-profile-content-box">

                    <div class="home-info-profile-content-title">
                        Assigned
                    </div>
                    <div class="home-info-profile-content-amount">
                        0
                    </div>

                </div>

                <div class="home-info-profile-content-box">

                    <div class="home-info-profile-content-title">
                        Completed
                    </div>
                    <div class="home-info-profile-content-amount">
                        0
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="home-wrapper">
        <main class="all-courses-page">
            <!-- Container around the list of courses -->
            <div class="general-container courses">
                <h2> Assigned</h2>
                <!-- Course box -->

            </div>
            <!-- Container around the list of courses -->
            <div class="general-container courses" id="assigned">
                <h2> In Progress</h2>
                <!-- Course box -->

            </div>



    </div>
    </main>








  <footer>
            <div class="footer-row-container">
                <div class="footer-row-text">
                    <a href="construction.html" class="footer-row-links">
                        Policy & Terms
                    </a>
                    <a href="construction.html" class="footer-row-links">
                        E-RIGHTS-Corporation 2020
                    </a>
                    <a href="construction.html" class="footer-row-links">
                        Help
                    </a>
                </div>
                <div class="footer-social-media">
                    <a href="404.html" class="footer-social-media-icons">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="404.html" class="footer-social-media-icons">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="404.html" class="footer-social-media-icons">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="404.html" class="footer-social-media-icons">
                        <i class="fab fa-youtube"></i>
                    </a>

                </div>

            </div>
            <div class="footer-image">
                <img src=assets/logo/logo-horizontal-2.svg alt="404">
            </div>

        </footer>
    <script src="js/main.js"></script>

</body>

</html>