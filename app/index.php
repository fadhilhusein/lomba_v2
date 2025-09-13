<?php
session_start();
include "config/db.php";
unset($_SESSION['flash']);

include "libs/php/auth.php";
loginState();

$username = $auth->getUsername();
$email = $auth->getEmail();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Overview - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="nav-fixed sidenav-toggled">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <!--card ads -daffa -->
                <div class="container d-flex">
                    <div class="card-daffa bg-primary bg-gradient mt-5 w-100">
                        <div class="card-body-daffa d-flex justify-content-center align-items-center">
                            <p class="card-text-daffa text-white ">Lorem ipsum</p>
                        </div>
                    </div>
                </div>

                <!-- anakan card-->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card course-card">
                                <div class="card-body course-card-body d-flex align-items-center">
                                    <div class="icon-container">
                                        <i i data-feather="code"></i>
                                    </div>
                                    <div class="text-content ms-3">
                                        <small class="text-muted">2/8 watched</small>
                                        <h6 class="mt-1">UI/UX Design</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card course-card">
                                <div class="card-body course-card-body d-flex align-items-center">
                                    <div class="icon-container">
                                        <i data-feather="code"></i>
                                    </div>
                                    <div class="text-content ms-3">
                                        <small class="text-muted">Website</small>
                                        <h6 class="mt-1">Branding</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card course-card">
                                <div class="card-body course-card-body d-flex align-items-center">
                                    <div class="icon-container">
                                        <i data-feather="code"></i>
                                    </div>
                                    <div class="text-content ms-3">
                                        <small class="text-muted">6/12 watched</small>
                                        <h6 class="mt-1">Front End</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- scroll card daffa-->

                <div class="container py-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold ms-4 mt-5">Our Job</h4>
                        <div class="d-flex">
                            <button class="btn btn-light rounded-circle me-2"><i
                                    data-feather="chevron-left"></i></button>
                            <button class="btn btn-light rounded-circle"><i data-feather="chevron-right"></i></button>
                        </div>
                    </div>

                    <div class="row flex-nowrap horizontal-scroll-container pb-3">
                        <?php include_once "../components/JobCard.php" ?>
                    </div>
                </div>
                <!-- Main page content-->
                <div class="container-xl px-4">

                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>