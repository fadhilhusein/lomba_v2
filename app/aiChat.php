<?php
// Blok PHP untuk memproses data
include "config/db.php";
include "libs/php/auth.php";

loginState();

$username = $auth->getUsername();
$email = $auth->getEmail();

// Ambil data dari tabel 'articles'
try {
    // Variabel $pdo sudah tersedia dari 'config/db.php'
    $stmt = $pdo->query('SELECT title, tagline, author FROM articles ORDER BY created_at DESC');
    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
    // Tangani error database jika terjadi
    die("Error: " . $e->getMessage());
}
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
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
</head>

<body class="nav-fixed">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="box box__aichat">
                    <div class="box__greeting">
                        <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                            <h1><span class="letter">Hallo</span> <span class="gradient-text letter"><?= $username ?></span></h1>
                            <p><span class="letter">Apa</span> <span class="letter">yang</span> <span class="letter">bisa</span> <span class="letter">saya</span> <span class="letter">bantu</span> <span class="letter">hari</span> <span class="letter">ini?</span></p>
                        </div>
                    </div>
                    <div class="box__wraper row g-0 justify-content-center py-4">
                        <div class="box__chat col-12 px-2 px-md-0 col-md-6 d-flex flex-column h-100">
                            
                        </div>
                    </div>
                    <div class="box__footer p-3">
                        <div class="chat-box">
                            <input type="text" class="chat__input" placeholder="Ask CampusIT" />
                            <div class="chat-tools">
                                <button id="button-submit"><i class="ph ph-paper-plane-tilt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <!-- <footer class="footer-admin mt-auto footer-light">
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
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="js/aichat.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>