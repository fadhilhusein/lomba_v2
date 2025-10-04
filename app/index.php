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
            <main class="ci-page">

                <!-- Hero Section -->
                <section class="ci-hero position-relative js-hero">
                    <div class="ci-hero-media"></div>
                    <div class="ci-hero-overlay"></div>
                    <div class="container position-relative px-4 px-md-0">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="ci-hero-title js-hero-title">CampusImpact<br>tempat kamu berkembang</h1>

                                <!-- Search bar -->
                                <div class="ci-searchbar js-hero-search">
                                    <i class="bi bi-search ci-search-icon"></i>
                                    <input class="form-control" type="search"
                                        placeholder="Search for any service..." />
                                    <button class="btn btn-secondary ci-search-btn">
                                        <i class="ph-bold ph-magnifying-glass"></i>
                                    </button>
                                </div>

                                <!-- Trending tags -->
                                <div class="ci-trending d-flex flex-wrap gap-2 mt-3 js-hero-chips">
                                    <a href="#" class="ci-chip">website development</a>
                                    <a href="#" class="ci-chip">architecture &amp; interior design</a>
                                    <a href="#" class="ci-chip">UGC videos</a>
                                    <a href="#" class="ci-chip">video editing</a>
                                    <a href="#" class="ci-chip">
                                        vibe coding
                                        <span class="badge rounded-pill bg-primary-subtle text-white ms-1">new</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="px-4">
                    <!-- Categories -->
                    <section class="container py-4 js-observe" data-anim="cats">
                        <div class="ci-cat-grid">
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-desktop"></i></i><span>Programming & Tech</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-graphics-card"></i></i><span>Graphics & Design</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-presentation-chart"></i><span>Digital Marketing</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-pen-nib"></i><span>Writing & Translation</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-video-camera"></i><span>Video & Animation</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-cpu"></i><span>AI Services</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-music-notes"></i><span>Music & Audio</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-suitcase"></i><span>Business</span></a>
                            <a href="#" class="ci-cat js-cat"><i class="ph-bold ph-chats"></i><span>Consulting</span></a>
                        </div>
                    </section>
    
                    <!-- Popular Services -->
                    <section class="container py-5 js-observe" data-anim="cards">
                        <h2 class="fw-semibold mb-3">Popular services</h2>
                        <div class="ci-card-row py-2">
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">Vibe Coding</span>
                                <div class="ci-thumb"></div>
                            </a>
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">Website Development</span>
                                <div class="ci-thumb"></div>
                            </a>
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">Video Editing</span>
                                <div class="ci-thumb"></div>
                            </a>
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">Software Development</span>
                                <div class="ci-thumb"></div>
                            </a>
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">SEO</span>
                                <div class="ci-thumb"></div>
                            </a>
                            <a href="#" class="ci-service-card js-card">
                                <span class="ci-pill">Architecture & Interior Design</span>
                                <div class="ci-thumb"></div>
                            </a>
                        </div>
    
                        <!-- CTA Section -->
                        <div class="ci-cta mt-5 js-observe" data-anim="cta">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-7 p-4 p-lg-5">
                                    <h3 class="text-white fw-semibold">Need help with Vibe coding?</h3>
                                    <p class="text-white-50 mb-4">
                                        Get matched with the right expert to keep building and marketing your project
                                    </p>
                                    <a href="#" class="btn btn-light">Find an expert</a>
                                </div>
                                <div class="col-md-5 p-4 p-lg-5">
                                    <div class="ci-cta-illustration"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>

            </main>

            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2025</div>
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
    <script src="js/scripts.js"></script>
    <!-- anime.js sudah ada di <head>; inisialisasi ada di js/index.js -->
</body>


</html>