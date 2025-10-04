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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            <main class="ci-page container py-4 py-lg-5">

                <!-- Toolbar -->
                <div class="ci-toolbar">
                    <div class="ci-search">
                        <i class="bi bi-search ci-icon"></i>
                        <input type="search" placeholder="Cari proyek berdasarkan judul, deskripsi, atau skill..." />
                    </div>
                    <select class="ci-filter form-select">
                        <option selected>Semua Kategori</option>
                        <option>Web Development</option>
                        <option>Mobile Development</option>
                        <option>Design</option>
                        <option>Digital Marketing</option>
                    </select>
                </div>

                <!-- Statistik -->
                <div class="ci-stats">
                    <div class="ci-stat">
                        <div class="ci-stat-title">Total Proyek</div>
                        <div class="ci-stat-value">4</div>
                    </div>
                    <div class="ci-stat">
                        <div class="ci-stat-title">Proyek Urgent</div>
                        <div class="ci-stat-value">1</div>
                    </div>
                    <div class="ci-stat">
                        <div class="ci-stat-title">Rata-rata Budget</div>
                        <div class="ci-stat-value">Rp 3,2M</div>
                    </div>
                    <div class="ci-stat">
                        <div class="ci-stat-title">Proyek Tersimpan</div>
                        <div class="ci-stat-value">0</div>
                    </div>
                </div>

                <!-- Daftar Proyek -->
                <div class="ci-grid">
                    <!-- Card 1 -->
                    <article class="ci-card">
                        <div class="ci-card__body">
                            <div class="ci-card__header">
                                <span class="ci-badge ci-badge--cat">Web Development</span>
                                <span class="ci-badge ci-badge--urgent">Urgent</span>
                            </div>
                            <h3 class="ci-card__title">Pembuatan Website E-commerce untuk Toko Fashion</h3>
                            <p>Membutuhkan website e-commerce modern dengan fitur pembayaran online, manajemen inventory, dan dashboard admin yang user-friendly.</p>
                            <div class="ci-card__meta">
                                <span class="ci-meta-dot">Boutique Zahra • Jakarta Selatan</span>
                                <span><i class="bi bi-star-fill text-warning"></i> 4.8</span>
                            </div>
                            <div class="ci-tags">
                                <span class="ci-tag">React</span>
                                <span class="ci-tag">Node.js</span>
                                <span class="ci-tag">Payment Gateway</span>
                                <span class="ci-tag">UI/UX Design</span>
                            </div>
                        </div>
                        <div class="ci-card__footer">
                            <div class="ci-price">
                                <span class="ci-range">Rp 3.000.000 - 5.000.000</span>
                                <span class="ci-note">30 hari • 12 pelamar • 2 hari lalu</span>
                            </div>
                            <button class="ci-btn">Lamar Proyek</button>
                        </div>
                    </article>

                    <!-- Card 2 -->
                    <article class="ci-card">
                        <div class="ci-card__body">
                            <div class="ci-card__header">
                                <span class="ci-badge ci-badge--cat">Design</span>
                            </div>
                            <h3 class="ci-card__title">Desain Logo dan Brand Identity untuk Startup F&B</h3>
                            <p>Startup kuliner baru membutuhkan desain logo, brand guideline, dan materi marketing untuk launching produk minuman sehat.</p>
                            <div class="ci-card__meta">
                                <span class="ci-meta-dot">Green Juice Co. • Bandung</span>
                                <span><i class="bi bi-star-fill text-warning"></i> 4.9</span>
                            </div>
                            <div class="ci-tags">
                                <span class="ci-tag">Adobe Illustrator</span>
                                <span class="ci-tag">Brand Design</span>
                                <span class="ci-tag">Logo Design</span>
                            </div>
                        </div>
                        <div class="ci-card__footer">
                            <div class="ci-price">
                                <span class="ci-range">Rp 1.500.000 - 2.500.000</span>
                                <span class="ci-note">14 hari • 8 pelamar • 1 hari lalu</span>
                            </div>
                            <button class="ci-btn">Lamar Proyek</button>
                        </div>
                    </article>

                    <!-- Card 3 -->
                    <article class="ci-card">
                        <div class="ci-card__body">
                            <div class="ci-card__header">
                                <span class="ci-badge ci-badge--cat">Mobile Development</span>
                            </div>
                            <h3 class="ci-card__title">Aplikasi Mobile Delivery untuk Warung Makan</h3>
                            <p>Warung makan tradisional ingin ekspansi dengan layanan delivery. Butuh aplikasi mobile untuk customer dan dashboard untuk admin.</p>
                            <div class="ci-card__meta">
                                <span class="ci-meta-dot">Warung Bu Tini • Yogyakarta</span>
                                <span><i class="bi bi-star-fill text-warning"></i> 4.7</span>
                            </div>
                            <div class="ci-tags">
                                <span class="ci-tag">Flutter</span>
                                <span class="ci-tag">Firebase</span>
                                <span class="ci-tag">Google Maps API</span>
                                <span class="ci-tag">Payment Integration</span>
                            </div>
                        </div>
                        <div class="ci-card__footer">
                            <div class="ci-price">
                                <span class="ci-range">Rp 4.000.000 - 6.000.000</span>
                                <span class="ci-note">45 hari • 15 pelamar • 3 hari lalu</span>
                            </div>
                            <button class="ci-btn">Lamar Proyek</button>
                        </div>
                    </article>

                    <!-- Card 4 -->
                    <article class="ci-card">
                        <div class="ci-card__body">
                            <div class="ci-card__header">
                                <span class="ci-badge ci-badge--cat">Digital Marketing</span>
                            </div>
                            <h3 class="ci-card__title">Content Marketing dan Social Media Management</h3>
                            <p>UMKM produk skincare lokal membutuhkan strategi content marketing dan pengelolaan media sosial untuk meningkatkan brand awareness.</p>
                            <div class="ci-card__meta">
                                <span class="ci-meta-dot">Glowing Skin ID • Surabaya</span>
                                <span><i class="bi bi-star-fill text-warning"></i> 4.6</span>
                            </div>
                            <div class="ci-tags">
                                <span class="ci-tag">Content Writing</span>
                                <span class="ci-tag">Social Media Strategy</span>
                                <span class="ci-tag">Canva</span>
                                <span class="ci-tag">Instagram Marketing</span>
                            </div>
                        </div>
                        <div class="ci-card__footer">
                            <div class="ci-price">
                                <span class="ci-range">Rp 2.000.000 - 3.000.000</span>
                                <span class="ci-note">60 hari • 6 pelamar • 5 hari lalu</span>
                            </div>
                            <button class="ci-btn">Lamar Proyek</button>
                        </div>
                    </article>
                </div>

                <!-- Load More -->
                <div class="text-center mt-5">
                    <button class="ci-btn ci-btn--ghost">Muat Lebih Banyak Proyek</button>
                </div>

            </main>

            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; CampusImpact 2025</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#">Privacy Policy</a> &middot; <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>