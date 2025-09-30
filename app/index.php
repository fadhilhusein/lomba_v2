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
    <link href="css/index.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
    <script src="index.js"></script>
</head>

<body class="nav-fixed">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <!--card ads -daffa -->



                <body>

                    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Penggunaan class kustom yang baru -->
                    <div class="main-content-fadhil">

                        <!-- Judul Utama -->
                        <h1 class="main-title-fadhil mb-3">Campus Impact</h1>

                        <!-- Teks Deskripsi -->
                        <p class="description-text-fadhil">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>

                        <!-- Teks Panduan -->
                        <p class="guide-text-fadhil">Lanjut Sebagai</p>

                        <!-- Pilihan Lanjut (Tombol) -->
                        <div class="btn-group-custom-fadhil d-flex flex-column flex-sm-row justify-content-center gap-2">
                            <!-- Tombol 1: Mahasiswa -->
                            <button type="button" class="btn btn-black-custom-fadhil">Mahasiswa</button>
                            
                            <!-- Tombol 2: UMKM/Umum -->
                            <button type="button" class="btn btn-black-custom-fadhil">UMKM/Umum</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

                    <!-- anakan card-->


                    <!-- scroll card daffa-->
                    <div class="container py-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bold ms-4 mt-5">Our Job</h2>
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

                    <?php include_once "../components/aiButton.php" ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/index.js"></script>
</body>

</html>