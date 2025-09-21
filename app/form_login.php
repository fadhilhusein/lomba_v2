<?php
session_start();
include "libs/php/auth.php";
loginState(true);

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']); // hapus biar tidak muncul terus
unset($_SESSION['data_user']);
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
                    <div class="col-md-6 d-flex flex-column justify-content-center px-5" id="main">
                        <div class="form-header mb-3">
                            <h1 class="fw-bolder"><span class="gradient-text">Campus</span>Impact</h1>
                            <p>Don't have an account? <a href="form_register.php">Sign up</a></p>
                        </div>
                        <form class="needs-validation" action="action/login.php" method="post" novalidate>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter email address" required />
                                <div class="invalid-feedback">
                                    Masukan email anda.
                                </div>
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter password" required />
                                <div class="invalid-feedback">
                                    Masukan password anda.
                                </div>
                            </div>
                            <!-- Form Group (remember password checkbox)-->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="rememberMe" id="rememberPasswordCheck" type="checkbox" value="" />
                                    <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
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

                            <!-- Form Group (login box)-->
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="form_forgot.php">Forgot Password?</a>
                                <button class="btn btn-primary" type="submit">Login</button>
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

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>