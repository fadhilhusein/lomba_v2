<?php
include "config/db.php"
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
    <link href="css/kategori.css" rel="stylesheet" />
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

                <!-- Main page content-->
                <div class="container-fluid py-4 bg-white">
    <div class="container">
        <ul class="nav nav-pills d-flex justify-content-center flex-nowrap overflow-auto pb-2">
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="WordPress" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    WordPress
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="Shopify" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    Shopify
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="Custom Websites" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    Custom Websites
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="Webflow" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    Webflow
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="Wix" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    Wix
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link active" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="WooCommerce" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    WooCommerce
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link text-muted" href="#">
                    <img src="./assets/img/bahan/logo store online.jpg" alt="Squarespace" class="me-2 rounded-circle" style="width: 30px; height: 30px;">
                    Squarespace
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center filter-section mb-3">
        <div class="d-flex gap-2 flex-wrap">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle filter-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Service options
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle filter-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seller details
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle filter-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Budget
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle filter-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Delivery time
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center flex-wrap">
            <div class="form-check form-switch me-3">
                <input class="form-check-input" type="checkbox" id="proServices">
                <label class="form-check-label" for="proServices">Pro services</label>
            </div>
            <span class="badge badge-pro me-1">Instant response</span>
            <span class="badge rounded-pill bg-danger">New</span>
            <div class="ms-4">
                <span class="text-muted me-2">Sort by:</span>
                <span class="fw-bold">Best selling <i class="fas fa-chevron-down"></i></span>
            </div>
        </div>
    </div>

    <h5 class="mb-4 text-muted">1,100+ results</h5>

    <div class="row g-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card card-service h-100">
                <div class="position-relative">
                    <img src="./assets/img/bahan/logo store online.jpg" class="card-img-top" alt="Card Image">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="fas fa-play-circle text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted ad-by">Ad by <span class="text-dark fw-bold">DarkStar Soft</span></small>
                        <span class="vetter-pro-badge float-end">Vetted Pro</span>
                    </div>
                    <p class="card-text">Our agency will develop headless wordpress or woocommerce with react...</p>
                    <div class="d-flex align-items-center">
                        <div class="me-2 rating-star">
                            <i class="fas fa-star"></i>
                            <span class="text-dark fw-bold">5.0</span>
                        </div>
                        <span class="text-muted">(1)</span>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-muted">From</span>
                    <span class="card-title">$5,000</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card card-service h-100">
                <div class="position-relative">
                    <img src="./assets/img/bahan/logo store online.jpg" class="card-img-top" alt="Card Image">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="fas fa-play-circle text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted ad-by">Ad by <span class="text-dark fw-bold">Sissi Wedgwood</span></small>
                        <span class="vetter-pro-badge float-end">Vetted Pro</span>
                    </div>
                    <p class="card-text">I will build a complete woocommerce business website</p>
                    <div class="d-flex align-items-center">
                        <div class="me-2 rating-star">
                            <i class="fas fa-star"></i>
                            <span class="text-dark fw-bold">4.9</span>
                        </div>
                        <span class="text-muted">(11)</span>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-muted">From</span>
                    <span class="card-title">$0,000</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card card-service h-100">
                <div class="position-relative">
                    <img src="./assets/img/bahan/logo store online.jpg" class="card-img-top" alt="Card Image">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="fas fa-play-circle text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted ad-by">Ad by <span class="text-dark fw-bold">Andrew</span></small>
                        <span class="vetter-pro-badge float-end">Vetted Pro</span>
                    </div>
                    <p class="card-text">I will design a professional shopify dropshipping store</p>
                    <div class="d-flex align-items-center">
                        <div class="me-2 rating-star">
                            <i class="fas fa-star"></i>
                            <span class="text-dark fw-bold">4.9</span>
                        </div>
                        <span class="text-muted">(1,495)</span>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-muted">From</span>
                    <span class="card-title">$1,495</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card card-service h-100">
                <div class="position-relative">
                    <img src="./assets/img/bahan/logo store online.jpg" class="card-img-top" alt="Card Image">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="fas fa-play-circle text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted ad-by">Ad by <span class="text-dark fw-bold">Stas Sorokin</span></small>
                        <span class="vetter-pro-badge float-end">Vetted Pro</span>
                    </div>
                    <p class="card-text">I will program shopify store or Iim ap for shopify website</p>
                    <div class="d-flex align-items-center">
                        <div class="me-2 rating-star">
                            <i class="fas fa-star"></i>
                            <span class="text-dark fw-bold">5.0</span>
                        </div>
                        <span class="text-muted">(99+)</span>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-muted">From</span>
                    <span class="card-title">$1,550</span>
                </div>
            </div>
        </div>
    </div>
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