<?php
    session_start();
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']); // hapus biar tidak muncul terus
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center fw-bolder">
                                    <h3 class="fw-light my-4">Daftar akun</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form action="./action/register.php" method="post">
                                        <!-- Form Row-->
                                        <div class="row gx-3">
                                            <div class="col-12">
                                                <!-- Form Group (first name)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputFirstName">Username</label>
                                                    <input class="form-control" id="inputFirstName" name="username" type="text" placeholder="Enter first name" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address) -->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Tipe Pengguna</label>
                                            <select class="form-select" aria-label="Default select example" id="tipePengguna" name="tipePengguna">
                                                <option value="" class="d-none" selected>Pilih tipe pengguna</option>
                                                <option value="MHS">MAHASISWA</option>
                                                <option value="UMUM">UMUM</option>
                                            </select>
                                        </div>
                                        <!-- Form Group (email address) -->
                                        <div class="mb-3" id="inputEmailMahasiswa">
                                            <label class="small mb-1" for="inputEmailAddress">Email Kampus</label>
                                            <input class="form-control" id="inputEmailAddress" name="emailMahasiswa" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                        <!-- Form Row    -->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control" id="inputConfirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (create account submit)-->
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="form_login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
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

    <?php if ($flash): ?>
    <script>
        Swal.fire({
        icon: '<?= $flash['type'] ?>',
        title: '<?= $flash['title'] ?>',
        text: '<?= $flash['text'] ?>'
        })
    </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('#inputEmailMahasiswa').hide();

            $("#tipePengguna").change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'MHS') {
                    $('#inputEmailMahasiswa').slideDown();
                } else {
                    $('#inputEmailMahasiswa').slideUp();
                }
            })
        })
    </script>
</body>

</html>