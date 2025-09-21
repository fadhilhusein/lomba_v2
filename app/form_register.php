<?php
session_start();
include "libs/php/auth.php";
loginState(true);

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
    <title>Login - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
    <div id="layoutAuthentication">
        <div class="row login-page" id="layoutAuthentication_content">
            <main class="col-12 p-0">
                <div class="row g-0 h-100">
                    <div class="col-md-6 d-flex flex-column justify-content-md-center py-5 py-md-0 px-5" id="main">
                        <div class="form-header mb-4 d-md-flex justify-content-between">
                            <h1 class="fw-bolder"><span class="gradient-text">Campus</span>Impact</h1>
                            <h2>Sign Up</h2>
                        </div>
                        <div id="user_selection" class="row h-25">
                            <div class="row gap-2 gap-md-0 col-md-12 mb-3">
                                <div class="col-md-6">
                                    <div id="select_mahasiswa" class="bg-primary bg-gradient py-4 d-flex flex-column justify-content-center align-items-center gap-3 w-100 h-100 rounded-2">
                                        <div>
                                            <i class="icon-large text-white" data-feather="user"></i>
                                        </div>
                                        <h3 class="text-white fw-bold">Mahasiswa</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="select_umum" class="bg-secondary bg-gradient py-4 d-flex flex-column justify-content-center align-items-center gap-3 w-100 h-100 rounded-2">
                                        <div>
                                            <i class="icon-large text-white" data-feather="users"></i>
                                        </div>
                                        <h3 class="text-white fw-bold">Umum/UMKM</h3>
                                    </div>
                                </div>
                            </div>
                            <?php if ($flash): ?>
                                <?php if ($flash['type'] == 'success'): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $flash['text'] ?>
                                    </div>
                                <?php elseif ($flash['type'] == 'error'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $flash['text'] ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="row col-md-12">
                                <div class="col-12">
                                    <a class="small" href="form_login.php">Have an account? Login</a>
                                </div>
                            </div>
                        </div>

                        <!-- Register mahasiswa -->
                        <form id="register_mahasiswa" class="needs-validation" action="action/register.php" method="post" novalidate>
                            <input type="text" name="role" value="mahasiswa" class="d-none">
                            <!-- Form Row-->
                            <div class="row gx-3">
                                <div class="col-12">
                                    <!-- Form Group (first name)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputFirstName">Username</label>
                                        <input class="form-control" id="inputFirstName" name="username" type="text" placeholder="Enter first name" required />
                                        <div class="invalid-feedback">
                                            Masukan username anda.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group (email address) -->
                            <div class="mb-3" id="inputEmailMahasiswa">
                                <label class="small mb-1" for="inputEmailAddress">Email Kampus</label>
                                <input class="form-control" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required />
                                <div class="invalid-feedback">
                                    Masukan email kampus anda.
                                </div>
                            </div>
                            <!-- Form Row    -->
                            <div class="row gx-3">
                                <div class="col-md-6">
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter password" required />
                                        <div class="invalid-feedback">
                                            Masukan password akun anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Form Group (confirm password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                        <input class="form-control" id="inputConfirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required />
                                    </div>
                                </div>
                            </div>
                            <div class="passwordCheck alert alert-danger" role="alert">
                            </div>
                            <!-- Form Group (login box)-->
                            <div class="d-flex flex-column-reverse flex-md-row gap-5 gap-md-0 align-items-start align-items-md-center justify-content-between mt-4 mb-0">
                                <a class="small" href="form_login.php">Have an account? Login</a>
                                <button class="btn btn-primary" type="submit">Create account</button>
                            </div>
                        </form>

                        <!-- Register Umum -->
                        <form id="register_umum" class="needs-validation" action="action/register.php" method="post" novalidate>
                            <input type="text" name="role" value="umum" class="d-none">
                            <!-- Form Row-->
                            <div class="row gx-3">
                                <div class="col-12">
                                    <!-- Form Group (first name)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputFirstName">Username</label>
                                        <input class="form-control" id="inputFirstName" name="username" type="text" placeholder="Enter first name" required />
                                        <div class="invalid-feedback">
                                            Masukan username anda.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Group (email address) -->
                            <div class="mb-3" id="inputEmailMahasiswa">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required />
                                <div class="invalid-feedback">
                                    Masukan email anda.
                                </div>
                            </div>
                            <!-- Form Row    -->
                            <div class="row gx-3">
                                <div class="col-md-6">
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter password" required />
                                        <div class="invalid-feedback">
                                            Masukan password akun anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Form Group (confirm password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                        <input class="form-control" id="inputConfirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required />
                                    </div>
                                </div>
                            </div>
                            <div class="passwordCheck alert alert-danger" role="alert">
                            </div>
                            <!-- Form Group (login box)-->
                            <div class="d-flex flex-column-reverse flex-md-row gap-5 gap-md-0 align-items-start align-items-md-center justify-content-between mt-4 mb-0">
                                <a class="small" href="form_login.php">Have an account? Login</a>
                                <button class="btn btn-primary" type="submit">Create account</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-md-block radius-end" id="signature">
                        <img class="img-fluid image-login" src="assets/img/backgrounds/campus.jpg" alt="campus">
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small text-black">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small text-black">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    let dataForm = new FormData(form);

                    let password = dataForm.get('password');
                    let confirmPassword = dataForm.get('confirmPassword');

                    if (password !== confirmPassword) {
                        $('.passwordCheck').show();
                        $('.passwordCheck').text('Password atau confirm password tidak sesuai!')
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        $('.passwordCheck').hide();
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        $(document).ready(function() {
            $(".passwordCheck").hide()
            $("#register_mahasiswa").hide()
            $("#register_umum").hide()

            $("#select_mahasiswa").click(function() {
                $("#user_selection").hide()
                $("#register_mahasiswa").show()
            })

            $("#select_umum").click(function() {
                $("#user_selection").hide()
                $("#register_umum").show()
            })
        })
    </script>
</body>

</html>