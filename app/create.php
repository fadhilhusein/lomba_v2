<?php
include "config/db.php";
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
    <link href="css/create.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="nav-fixed sidenav-toggled">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>

                <!-- Main page content-->
                <div class="form-card">
                    <div class="icon-plus">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h2 class="title">Tambah Data Baru</h2>
                    <p class="subtitle">Masukkan informasi data yang akan ditambahkan</p>

                    <form id="dataForm">
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
                            <input type="text" id="judul" placeholder="Masukkan judul konten...">
                            <p class="error-message" id="judul-error">Judul harus diisi</p>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" placeholder="Masukkan nama author...">
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

                        form.addEventListener('submit', function(event) {
                            // Mencegah form untuk dikirim secara default
                            event.preventDefault();

                            let isValid = true;
                            const inputTagline = document.getElementById('tagline');
                            const inputJudul = document.getElementById('judul');
                            const inputAuthor = document.getElementById('author');

                            // Sembunyikan semua pesan error terlebih dahulu
                            document.querySelectorAll('.error-message').forEach(el => {
                                el.style.display = 'none';
                            });

                            // Validasi input Tagline
                            if (inputTagline.value.trim() === '') {
                                document.getElementById('tagline-error').style.display = 'block';
                                isValid = false;
                            }

                            // Validasi input Judul
                            if (inputJudul.value.trim() === '') {
                                document.getElementById('judul-error').style.display = 'block';
                                isValid = false;
                            }

                            // Validasi input Author
                            if (inputAuthor.value.trim() === '') {
                                document.getElementById('author-error').style.display = 'block';
                                isValid = false;
                            }

                            // Jika semua input valid
                            if (isValid) {
                                Swal.fire({
                                    title: 'Data berhasil ditambahkan!',
                                    text: 'Formulir Anda telah dikirim.',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                }).then(() => {
                                    // Opsional: Setelah SweetAlert ditutup, reset form
                                    form.reset();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Harap lengkapi semua kolom yang kosong.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        });
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                    crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
</body>

</html>