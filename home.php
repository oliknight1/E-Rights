<?php
require_once 'core/init.php';
$user = new User();
$user->findUser($_SESSION['user']);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/responsive-tablet.css">
    <link rel="stylesheet" href="styles/responsive-mobile.css">
    <script src="https://kit.fontawesome.com/96867cee00.js"></script>
    <title>E-Rights</title>

</head>

<body>
    <div class="home-wrapper">
        <div class="header-container">
            <div class="header-logo">
                <img src=assets/logo/logo-horizontal-2.svg alt="404">
            </div>
            <div class="header-nav">
                <div class="header-nav-containers">
                    <div class="header-nav-icon">
                        <a href="#"><i class="fas fa-home"></i></a>
                    </div>
                    <a href="#" class="header-nav-name">
                        Home
                    </a>
                </div>
                <div class="header-nav-containers">
                    <div class="header-nav-icon">
                        <a href="#"><i class="fas fa-book-open"></i></a>
                    </div>
                    <a href="#" class="header-nav-name">
                        Courses
                    </a>
                </div>
                <div class="header-nav-containers">
                    <div class="header-nav-icon">
                        <a href="#"><i class="fas fa-graduation-cap"></i></a>
                    </div>
                    <a href="#" class="header-nav-name">
                        My Learning
                    </a>
                </div>
                <div class="header-nav-containers">
                    <div class="header-nav-icon">
                        <a href="#"><i class="fas fa-user"></i></a>
                    </div>
                    <a href="#" class="header-nav-name">
                        Account
                    </a>
                </div>

            </div>

        </div>

        <div class="home-info-container">
            <div class="home-info-text-container">

                <div class="home-info-text-title">
                    <p>Hi <?php echo $user->getData()['username']; ?>!</p>
                </div>
                <div class="home-info-text-content">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro in adipisci dolor quia obcaecati nemo
                        quis! Tenetur magni deleniti illo quo sapiente laboriosam illum, qui minus totam hic ut quibusdam.</p>
                </div>

            </div>
            <div class="home-info-profile-container">

                <div class="profile-icon">
                    <p><?php echo $user->getData()['username'][0]; ?></p>
                </div>
                <div class="home-info-profile-content">

                    <div class="home-info-profile-content-box">

                        <div class="home-info-profile-content-title">
                            <p>Assigned</p>
                        </div>
                        <div class="home-info-profile-content-amount">
                            <p>4</p>
                        </div>

                    </div>

                    <div class="home-info-profile-content-box">

                        <div class="home-info-profile-content-title">
                            <p>Completed</p>
                        </div>
                        <div class="home-info-profile-content-amount">
                            <p>0</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>






        <div class="home-course-container">

            <div class="home-course-header">
                <p>Assigned</p>
            </div>
            <div class="home-course-content">
                <a href="#">
                    <div class="home-course-box-container">
                        <div class="home-course-box">
                            <div class="home-course-color-1">
                                <div class="home-course">
                                    <img src=assets/illustrations/course-images/principles.svg alt="404">
                                </div>

                            </div>
                            <p>Principles</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="home-course-box-container">
                        <div class="home-course-box">
                            <div class="home-course-color-2">
                                <div class="home-course">
                                    <img src=assets/illustrations/course-images/rights.svg alt="404">
                                </div>

                            </div>
                            <p>Rights</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="home-course-box-container">
                        <div class="home-course-box">
                            <div class="home-course-color-3">
                                <div class="home-course">
                                    <img src=assets/illustrations/course-images/GDPR.svg alt="404">
                                </div>

                            </div>
                            <p>Why is GDPR important?</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="home-course-box-container">
                        <div class="home-course-box">
                            <div class="home-course-color-4">
                                <div class="home-course">
                                    <img src=assets/illustrations/course-images/data.svg alt="404">
                                </div>

                            </div>
                            <p>Data Minimalism</p>
                        </div>
                    </div>
                </a>


            </div>

        </div>

        <div class="home-course-container">
            <div class="home-course-header">
                <p>In Progress</p>
            </div>
        </div>



    </div>



    <div class="footer">
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
            <img src=assets/logo/logo-horizontal-2.svg alt="404">
        </div>

    </div>
</body>

</html>