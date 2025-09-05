<?php
include "config/db.php";
include "libs/php/auth.php";

loginState();
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
    <link href="css/create.css" rel="stylesheet" />
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

                <!-- Main page content-->
                <div class="container-xl px-4">
                    <div class="container">
                        <div class="form-card">

                            <h2 class="title">Edit Data</h2>
                            <p class="subtitle">Masukkan informasi data yang akan ditambahkan</p>

                            <form id="dataForm">
                                <div class="form-group">
                                    <label for="tagline">Tagline</label>
                                    <input type="text" id="tagline" placeholder="Masukkan tagline yang menarik...">
                                    <p class="error-message" id="tagline-error">Tagline harus diisi</p>
                                </div>

                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" placeholder="Masukkan judul konten...">
                                    <p class="error-message" id="judul-error">Judul harus diisi</p>
                                </div>

                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" id="author" placeholder="Masukkan nama author...">
                                    <p class="error-message" id="author-error">Author harus diisi</p>
                                </div>

                                <button type="submit" class="submit-button">
                                     Submit
                                </button>
                            </form>
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