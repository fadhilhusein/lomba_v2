<?php
// Bagian PHP untuk memproses data dari formulir
// Kode ini akan berjalan saat formulir dikirim (POST)
include "config/db.php";
include "libs/php/auth.php";

loginState();

$username = $auth->getUsername();
$email = $auth->getEmail();

// Periksa apakah data dikirim melalui method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $tagline = htmlspecialchars(trim($_POST['tagline']));
    $title = htmlspecialchars(trim($_POST['title']));
    $author = htmlspecialchars(trim($_POST['author']));
    $createdAt = time(); // Waktu saat ini

    // Validasi data di sisi server
    if (empty($tagline) || empty($title) || empty($author)) {
        // Jika ada data yang kosong, arahkan kembali dengan parameter 'gagal'
        header("Location: create.php?status=gagal");
        exit();
    } else {
        try {
            // Masukkan data ke database menggunakan PDO
            $sql = "INSERT INTO articles (tagline, title, author, created_at) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$tagline, $title, $author, $createdAt]);

            // Jika berhasil, arahkan kembali dengan parameter 'sukses'
            header("Location: create.php?status=sukses");
            exit();

        } catch (PDOException $e) {
            // Tangani error jika terjadi masalah pada database
            die("Error: " . $e->getMessage());
        }
    }
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
    <title>Create Article</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/create.css" rel="stylesheet" />
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
            <main>

                <div class="form-card">
                    <div class="icon-plus">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h2 class="title">Tambah Data Baru</h2>
                    <p class="subtitle">Masukkan informasi data yang akan ditambahkan</p>

                    <form id="dataForm" action="create.php" method="POST">
                        <div class="form-group">
                            <label for="tagline">Tagline</label>
                            <select id="tagline" name="tagline" class="form-control">
                                <option value="">Pilih Tagline</option>
                                <option value="Web Development">Web Development</option>
                                <option value="UI/UX">UI/UX</option>
                                <option value="Design">Design</option>
                                <option value="Copy Writing">Copy Writing</option>
                            </select>
                            <p class="error-message" id="tagline-error">Tagline harus diisi</p>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="title" placeholder="Masukkan judul konten...">
                            <p class="error-message" id="judul-error">Judul harus diisi</p>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" placeholder="Masukkan nama author...">
                            <p class="error-message" id="author-error">Author harus diisi</p>
                        </div>

                        <button type="submit" class="submit-button">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                    </form>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('dataForm');
                        
                        // Kode SweetAlert untuk menampilkan notifikasi berdasarkan URL
                        const urlParams = new URLSearchParams(window.location.search);
                        const status = urlParams.get('status');

                        if (status === 'sukses') {
                            Swal.fire({
                                title: 'Data Berhasil Ditambahkan!',
                                text: 'Job baru telah berhasil dibuat.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Mengalihkan ke halaman kategori setelah SweetAlert ditutup
                                window.location.href = 'kategori.php';
                            });
                        } else if (status === 'gagal') {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Harap lengkapi semua kolom yang kosong.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }

                        // Kode validasi form
                        form.addEventListener('submit', function(event) {
                            let isValid = true;
                            const inputTagline = document.getElementById('tagline');
                            const inputJudul = document.getElementById('judul');
                            const inputAuthor = document.getElementById('author');

                            document.querySelectorAll('.error-message').forEach(el => {
                                el.style.display = 'none';
                            });

                            if (inputTagline.value.trim() === '') {
                                document.getElementById('tagline-error').style.display = 'block';
                                isValid = false;
                            }

                            if (inputJudul.value.trim() === '') {
                                document.getElementById('judul-error').style.display = 'block';
                                isValid = false;
                            }

                            if (inputAuthor.value.trim() === '') {
                                document.getElementById('author-error').style.display = 'block';
                                isValid = false;
                            }
                            
                            if (!isValid) {
                                event.preventDefault(); // Mencegah pengiriman form jika validasi gagal
                            }
                        });
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                    crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
            </main>
        </div>
    </div>
</body>

</html>