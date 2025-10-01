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
            <div class="container py-4 py-lg-5">

        <div class="row mb-4 align-items-center ms-1">
            <div class="col-lg-8">
                <div class="search-bar position-relative">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="form-control form-control-lg" placeholder="Cari proyek berdasarkan judul, deskripsi, atau skill...">
                </div>
            </div>
            <div class="col-lg-4 mt-3 mt-lg-0">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-lg dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Semua Kategori
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li><a class="dropdown-item" href="#">Web Development</a></li>
                        <li><a class="dropdown-item" href="#">Mobile Development</a></li>
                        <li><a class="dropdown-item" href="#">Design</a></li>
                        <li><a class="dropdown-item" href="#">Digital Marketing</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-3 g-md-4 mb-5 ms-1">
            <div class="col-6 col-lg-3">
                <div class="card stat-card total-proyek">
                    <div class="card-body">
                        <div class="icon-circle"><i class="bi bi-eye"></i></div>
                        <div>
                            <h6>Total Proyek</h6>
                            <p>4</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card stat-card proyek-urgent">
                    <div class="card-body">
                        <div class="icon-circle"><i class="bi bi-clock"></i></div>
                        <div>
                            <h6>Proyek Urgent</h6>
                            <p>1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card stat-card rata-rata-budget">
                    <div class="card-body">
                        <div class="icon-circle"><i class="bi bi-currency-dollar"></i></div>
                        <div>
                            <h6>Rata-rata Budget</h6>
                            <p>Rp 3,2M</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card stat-card proyek-tersimpan">
                    <div class="card-body">
                        <div class="icon-circle"><i class="bi bi-bookmark"></i></div>
                        <div>
                            <h6>Proyek Tersimpan</h6>
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="category-tag">Web Development</span>
                                <span class="urgent-tag">Urgent</span>
                            </div>
                            <i class="bi bi-bookmark bookmark-icon"></i>
                        </div>
                        <h4 class="card-title">Pembuatan Website E-commerce untuk Toko Fashion</h4>
                        <p class="card-text mb-3">Membutuhkan website e-commerce modern dengan fitur pembayaran online, manajemen inventory, dan dashboard admin yang user-friendly.</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="company-info">Boutique Zahra • Jakarta Selatan</span>
                            <span class="rating"><i class="bi bi-star-fill"></i> 4.8</span>
                        </div>
                        
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Node.js</span>
                            <span class="skill-tag">Payment Gateway</span>
                            <span class="skill-tag">UI/UX Design</span>
                        </div>

                        <div class="row g-3 project-details mt-auto">
                            <div class="col-6 col-sm-6"><i class="bi bi-currency-dollar me-2"></i>Rp 3.000.000 - 5.000.000</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-clock me-2"></i>30 hari</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-people me-2"></i>12 pelamar</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-calendar3 me-2"></i>2 hari yang lalu</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 p-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Lamar Proyek</button>
                            <button class="btn btn-view"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="category-tag">Design</span>
                            </div>
                            <i class="bi bi-bookmark bookmark-icon"></i>
                        </div>
                        <h4 class="card-title">Desain Logo dan Brand Identity untuk Startup F&B</h4>
                        <p class="card-text mb-3">Startup kuliner baru membutuhkan desain logo, brand guideline, dan materi marketing untuk launching produk minuman sehat.</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="company-info">Green Juice Co. • Bandung</span>
                            <span class="rating"><i class="bi bi-star-fill"></i> 4.9</span>
                        </div>
                        
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="skill-tag">Adobe Illustrator</span>
                            <span class="skill-tag">Brand Design</span>
                            <span class="skill-tag">Logo Design</span>
                        </div>

                        <div class="row g-3 project-details mt-auto">
                            <div class="col-6 col-sm-6"><i class="bi bi-currency-dollar me-2"></i>Rp 1.500.000 - 2.500.000</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-clock me-2"></i>14 hari</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-people me-2"></i>8 pelamar</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-calendar3 me-2"></i>1 hari yang lalu</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 p-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Lamar Proyek</button>
                            <button class="btn btn-view"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="category-tag">Mobile Development</span>
                            </div>
                            <i class="bi bi-bookmark bookmark-icon"></i>
                        </div>
                        <h4 class="card-title">Aplikasi Mobile Delivery untuk Warung Makan</h4>
                        <p class="card-text mb-3">Warung makan tradisional ingin ekspansi dengan layanan delivery. Butuh aplikasi mobile untuk customer dan dashboard untuk admin.</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="company-info">Warung Bu Tini • Yogyakarta</span>
                            <span class="rating"><i class="bi bi-star-fill"></i> 4.7</span>
                        </div>
                        
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="skill-tag">Flutter</span>
                            <span class="skill-tag">Firebase</span>
                            <span class="skill-tag">Google Maps API</span>
                            <span class="skill-tag">Payment Integration</span>
                        </div>

                        <div class="row g-3 project-details mt-auto">
                            <div class="col-6 col-sm-6"><i class="bi bi-currency-dollar me-2"></i>Rp 4.000.000 - 6.000.000</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-clock me-2"></i>45 hari</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-people me-2"></i>15 pelamar</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-calendar3 me-2"></i>3 hari yang lalu</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 p-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Lamar Proyek</button>
                            <button class="btn btn-view"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="category-tag">Digital Marketing</span>
                            </div>
                            <i class="bi bi-bookmark bookmark-icon"></i>
                        </div>
                        <h4 class="card-title">Content Marketing dan Social Media Management</h4>
                        <p class="card-text mb-3">UMKM produk skincare lokal membutuhkan strategi content marketing dan pengelolaan media sosial untuk meningkatkan brand awareness.</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="company-info">Glowing Skin ID • Surabaya</span>
                            <span class="rating"><i class="bi bi-star-fill"></i> 4.6</span>
                        </div>
                        
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="skill-tag">Content Writing</span>
                            <span class="skill-tag">Social Media Strategy</span>
                            <span class="skill-tag">Canva</span>
                            <span class="skill-tag">Instagram Marketing</span>
                        </div>

                        <div class="row g-3 project-details mt-auto">
                            <div class="col-6 col-sm-6"><i class="bi bi-currency-dollar me-2"></i>Rp 2.000.000 - 3.000.000</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-clock me-2"></i>60 hari</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-people me-2"></i>6 pelamar</div>
                            <div class="col-6 col-sm-6"><i class="bi bi-calendar3 me-2"></i>5 hari yang lalu</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 p-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Lamar Proyek</button>
                            <button class="btn btn-view"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-load-more">Muat Lebih Banyak Proyek</button>
        </div>

    </div>

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