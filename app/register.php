<?php
require __DIR__ . "/config/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['tipePengguna'] == 'MHS') {
        try {
            $userId = $auth->register($_POST['emailMahasiswa'], $_POST['password'], $_POST['username']);
    
            // generate OTP
            $otp = rand(100000, 999999);
            $expires = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    
            $stmt = $pdo->prepare("INSERT INTO users_otps (user_id, token, expires_at) VALUES (?, ?, ?)");
            $stmt->execute([$userId, $otp, $expires]);
    
            // kirim email OTP
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Pengirim
            $mail->setFrom('muhammad.fadhil.syahrian@gmail.com', 'CampusImpact');
    
            // Penerima
            $mail->addAddress($_POST['emailMahasiswa']);
    
            $mail->Subject = 'Kode OTP Verifikasi Anda';
            $mail->Body = "Halo {$_POST['username']}, kode OTP Anda adalah: $otp (berlaku 5 menit).";
    
            $mail->send();
    
            echo "Registrasi berhasil! Silakan cek email untuk OTP.";
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            echo 'Email sudah terdaftar';
        } catch (Exception $e) {
            echo 'Gagal mengirim email: ' . $e->getMessage();
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
    <title>Register - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
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
                                    <form action="" method="post">
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
                                    <div class="small"><a href="auth-login-basic.html">Have an account? Go to login</a></div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(document).ready(function () {
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