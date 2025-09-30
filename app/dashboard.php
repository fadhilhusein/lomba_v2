<?php
include "config/db.php";
include "libs/php/auth.php";

loginState();

// Tambahkan kode ini untuk menampilkan SweetAlert
if (isset($_GET['status']) && $_GET['status'] == 'success_edit') {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data artikel berhasil diperbarui.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
    ";
}

$username = $auth->getUsername();
$email = $auth->getEmail();

try {
    $stmt = $pdo->query('SELECT id, title, author, tagline FROM articles ORDER BY created_at DESC');
    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
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
    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
</head>

<body class="nav-fixed">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main class="container-fluid px-lg-4 py-4">
                <!-- Header Konten -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="fw-bold">Dashboard Mahasiswa</h2>
                        <p class="text-muted-light mb-0">Selamat datang kembali, <?= $username ?>!</p>
                    </div>
                    <a href="#" class="btn btn-primary d-none d-md-inline-flex align-items-center">
                        <i class="fa-regular fa-eye me-2"></i>
                        Lihat Portofolio Publik
                    </a>
                </div>

                <!-- Kartu Statistik -->
                <div class="row g-4 mb-4">
                    <!-- Kartu 1: Proyek Selesai -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-card-icon me-3">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div>
                                    <p class="text-muted-light mb-1">Proyek Selesai</p>
                                    <h4 class="fw-bold mb-0">1</h4>
                                </div>
                            </div>
                            <small class="text-muted mt-2">+2 dari bulan lalu</small>
                        </div>
                    </div>
                    <!-- Kartu 2: Total Penghasilan -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-card-icon me-3">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                </div>
                                <div>
                                    <p class="text-muted-light mb-1">Total Penghasilan</p>
                                    <h4 class="fw-bold mb-0">Rp 2.500.000</h4>
                                </div>
                            </div>
                            <small class="text-muted mt-2">+15% dari bulan lalu</small>
                        </div>
                    </div>
                    <!-- Kartu 3: Rating Rata-rata -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-card-icon me-3">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                                <div>
                                    <p class="text-muted-light mb-1">Rating Rata-rata</p>
                                    <h4 class="fw-bold mb-0">4.9</h4>
                                </div>
                            </div>
                            <small class="text-muted mt-2">Dari 12 ulasan</small>
                        </div>
                    </div>
                    <!-- Kartu 4: Proyek Aktif -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-card-icon me-3">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div>
                                    <p class="text-muted-light mb-1">Proyek Aktif</p>
                                    <h4 class="fw-bold mb-0">2</h4>
                                </div>
                            </div>
                            <small class="text-muted mt-2">Sedang dikerjakan</small>
                        </div>
                    </div>
                </div>

                <!-- Konten Utama: Kolom Kiri dan Kanan -->
                <div class="row g-4">
                    <!-- Kolom Kiri: Proyek Saat Ini -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">Proyek Saat Ini</h5>
                                <p class="card-subtitle mb-3 text-muted-light">Kelola dan pantau progress proyek yang sedang dikerjakan</p>

                                <div class="mt-4">
                                    <!-- Project Item 1 -->
                                    <div class="project-item py-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <h6 class="fw-semibold mb-0">Website E-commerce Toko Batik Nusantara</h6>
                                                <small class="text-muted">CV Batik Nusantara</small>
                                            </div>
                                            <span class="badge badge-custom badge-selesai">Selesai</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="progress flex-grow-1" role="progressbar" aria-label="Project progress" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 100%"></div>
                                            </div>
                                            <small class="fw-semibold ms-3">100%</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center text-muted-light">
                                            <small><i class="fa-regular fa-calendar-days me-1"></i> Deadline: 15/1/2024</small>
                                            <small class="fw-semibold text-dark">Rp 2.500.000</small>
                                        </div>
                                    </div>

                                    <!-- Project Item 2 -->
                                    <div class="project-item py-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <h6 class="fw-semibold mb-0">Aplikasi Mobile Delivery Makanan</h6>
                                                <small class="text-muted">Warung Bu Sari</small>
                                            </div>
                                            <span class="badge badge-custom badge-aktif">Aktif</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="progress flex-grow-1" role="progressbar" aria-label="Project progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                            <small class="fw-semibold ms-3">75%</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center text-muted-light">
                                            <small><i class="fa-regular fa-calendar-days me-1"></i> Deadline: 20/2/2024</small>
                                            <small class="fw-semibold text-dark">Rp 3.000.000</small>
                                        </div>
                                    </div>

                                    <!-- Project Item 3 -->
                                    <div class="project-item py-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <h6 class="fw-semibold mb-0">Sistem Inventory Gudang</h6>
                                                <small class="text-muted">PT Maju Jaya</small>
                                            </div>
                                            <span class="badge badge-custom badge-menunggu">Menunggu</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="progress flex-grow-1" role="progressbar" aria-label="Project progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                                            </div>
                                            <small class="fw-semibold ms-3">0%</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center text-muted-light">
                                            <small><i class="fa-regular fa-calendar-days me-1"></i> Deadline: -</small>
                                            <small class="fw-semibold text-dark">Rp 5.000.000</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Portofolio & Pencapaian -->
                    <div class="col-lg-4">
                        <!-- Kartu Portofolio -->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title fw-bold mb-0">Portofolio</h5>
                                    <a href="#" class="text-primary text-decoration-none small">Lihat Semua</a>
                                </div>
                                <div class="text-center py-4 px-3 border bg-light rounded-3">
                                    <i class="fa-regular fa-user fs-1 text-muted-light mb-3"></i>
                                    <p class="text-muted-light small mb-3">Portofolio Anda akan diperbarui otomatis setelah menyelesaikan proyek</p>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="fa-solid fa-download me-2"></i>Unduh CV
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu Pencapaian -->
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">Pencapaian</h5>
                                <p class="card-subtitle mb-3 text-muted-light">Badge yang telah Anda raih</p>
                                <ul class="list-unstyled mt-3">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fa-solid fa-trophy fs-4 me-3 text-warning"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-0">Proyek Pertama</h6>
                                            <small class="text-muted-light">Menyelesaikan proyek pertama</small>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fa-solid fa-user-group fs-4 me-3 text-primary"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-0">Pelanggan Setia</h6>
                                            <small class="text-muted-light">Mendapat proyek dari klien yang sama</small>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa-solid fa-star fs-4 me-3 text-info"></i>
                                        <div>
                                            <h6 class="fw-semibold mb-0">Rating Sempurna</h6>
                                            <small class="text-muted-light">Mendapatkan rating 5 bintang</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="js/datatables/datatables-simple-demo.js"></script>
            <script src="js/dashboard.js"></script>
        </div>
    </div>
</body>

</html>