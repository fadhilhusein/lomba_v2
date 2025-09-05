<?php
session_start();
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
                                    <h3 class="fw-light my-4">Reset Password</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form action="action/reset.php" method="post">
                                        <input class="d-none" type="text" name="selector" value="<?= $_GET['selector'] ?? "" ?>">
                                        <input class="d-none" type="text" name="token" value="<?= $_GET['token'] ?? "" ?>">

                                        <input class="form-control" type="password" name="password" placeholder="New password" required><br>
                                        <input class="form-control" type="password" placeholder="Confirm Password" required><br>
                                        <button class="btn btn-primary" type="submit">Reset Password</button>
                                    </form>
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
            Swal.fire({
                icon: '<?= $flash['type'] ?>',
                title: '<?= $flash['title'] ?>',
                text: '<?= $flash['text'] ?>',
                confirmButtonText: "Ok",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = './form_login.php';
                }
            });
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>