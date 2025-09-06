<?php
session_start();
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']); // hapus biar tidak muncul terus
unset($_SESSION['data_user']);
if (!isset($_GET['selector'])) {
    header("Location: form_login.php");
    exit;
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
                        <div class="form-header mb-4">
                            <h1 class="fw-bolder"><span class="purple-text">Campus</span>Impact</h1>
                        </div>
                        <form class="needs-validation" action="action/reset.php" method="post" novalidate>
                            <input class="d-none" type="text" name="selector" value="<?= $_GET['selector'] ?? "" ?>">
                            <input class="d-none" type="text" name="token" value="<?= $_GET['token'] ?? "" ?>">

                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="New password" required>
                                <div class="invalid-feedback">
                                    Masukan password akun anda.
                                </div>
                            </div>
                            <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password" required><br>
                            <div class="passwordCheck alert alert-danger" role="alert"></div>
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
                            <div class="d-flex flex-column-reverse flex-md-row gap-5 gap-md-0 align-items-start align-items-md-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Reset password</button>
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

    <?php if ($flash && $flash['type'] == 'success'): ?>
        <script>
            /* Read more about isConfirmed, isDenied below */
            setTimeout(function() {
                window.location.href = './form_login.php';
            }, 3000)
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            $('.passwordCheck').hide();

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
    </script>
</body>

</html>