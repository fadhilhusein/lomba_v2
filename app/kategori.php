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
                <div class="container py-4">
                    <div class="custom-search-container">
                        <input type="text" class="custom-search-input" placeholder="Search...">
                        <button class="custom-search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="row g-4">
                        <?php if (empty($articles)): ?>
                            <p>Belum ada artikel yang tersedia.</p>
                        <?php else: ?>
                            <?php foreach ($articles as $article): ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-service h-100">
                                        <div class="position-relative">
                                            <img src="./assets/img/bahan/logo store online.jpg" class="card-img-top" alt="Card Image">
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <small class="text-muted ad-by">Ad by <span class="text-dark fw-bold"><?php echo htmlspecialchars($article['author']); ?></span></small>
                                                <span class="vetter-pro-badge float-end">Front-End</span>
                                            </div>
                                            <p class="card-text">
                                                <?php echo htmlspecialchars($article['title']); ?>
                                                <br>
                                                <small><?php echo htmlspecialchars($article['tagline']); ?></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
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