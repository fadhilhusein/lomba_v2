<?php
session_start();
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']); // hapus biar tidak muncul terus

if (!isset($_SESSION['data_user'])) {
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

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my- text-center">Berhasil mendaftarkan akun!</h3>
                                </div>
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex justify-content-center mb-3"><i style="width:40px; height:40px;" data-feather="check-circle"></i></div>
                                    <p class="text-center">Silahkan cek email untuk verifikasi email anda!</p>
                                    <form id="resendEmailForm" class="w-100 d-flex justify-content-center" action="action/resendverification.php" method="post">
                                        <button class="btn btn-primary btn-resend-verification" type="submit">Resend email verification</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="form_register.php">Need an account? Sign up!</a></div>
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
            let btn = $(".btn-resend-verification")
            let countdown = 30;
            $(".btn-resend-verification").prop('disabled', true).text(`Tunggu ${countdown}s`);

            let timer = setInterval(function() {
                countdown--
                if (countdown < 0) {
                    clearInterval(timer)
                    $(".btn-resend-verification").prop('disabled', false).text('Resend email verification');
                } else {
                    $(".btn-resend-verification").text(`Tunggu ${countdown}s`);
                }
            }, 1000)
        })

    </script>
</body>

</html>