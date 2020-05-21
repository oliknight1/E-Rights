<?php

require_once 'core/init.php';
$user = new User();
$user->findUser($_SESSION['user']);
?>
<!DOCTYPE html>
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
 
    
    <title>E-Rights</title>
</head>

<body>
    <nav>
        <!-- Hamburger Menu -->

        <!-- Button that the user clicks -->
        <i class="fas fa-bars" id="open-menu"></i>

        <!-- Menu with links -->
        <div class="hamburger-menu">
            <header>
                <p> Hi aaaaaaaaaaaaaaa!</p>
                <i class="fas fa-times" id="close-menu"></i>
            </header>
            <ul>
                <li>
                    <div class="icon-container">
                        <i class="fas fa-home"></i>
                    </div>
                    Home
                </li>
                <li>
                    <div class="icon-container">
                        <i class="fas fa-book-open"></i>
                    </div>
                    All Courses
                </li>
                <li>
                    <div class="icon-container">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    My Learning
                </li>
                <li>
                    <div class="icon-container">
                        <i class="fas fa-user"></i>
                    </div>
                    Account
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
            <a href="#">
                <i class="fas fa-book-open"></i>
                <p>All Courses</p>
            </a>
            <a href="#">
                <i class="fas fa-graduation-cap"></i>
                <span>My Learning</span>
            </a>
            <a href="#">
                <i class="fas fa-user"></i>
                <span>Account</span>
            </a>
        </div>

    </nav>
    <main class="my-learning">
        <div class="assigned-bar">
            <ul>
                <li class="selected">Assigned</li>
                <li>In Progress</li>
                <li>Completed</li>
                <li>Certificates</li>
            </ul>
        </div>
        <!-- Container around the list of courses -->
        <div class="general-container">

            <!-- Course box -->



        </div>

    </main>

    <footer>
        <div class="footer-row-container">
            <a href="#" class="footer-row-links">
                Policy & Terms
            </a>
            <a href="#" class="footer-row-links">
                E-RIGHTS-Corporation 2020
            </a>
            <a href="#" class="footer-row-links">
                Help
            </a>
            <div class="footer-social-media">
                <a href="#" class="footer-social-media-icons">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#" class="footer-social-media-icons">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="footer-social-media-icons">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="footer-social-media-icons">
                    <i class="fab fa-youtube"></i>
                </a>

            </div>

        </div>
        <div class="footer-image">
            <img src=assets/logo/logo-horizontal-2.svg alt="Site Logo">
        </div>

    </footer>
    <script type="text/javascript" src="js/main.js"></script>
</body>


</html>