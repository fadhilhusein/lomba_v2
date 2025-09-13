<?php
session_start();
require __DIR__ . "/../config/db.php";
require __DIR__ . "/../config/Customroles.php";

use App\CustomRole;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {

            $verifyLink = "http://localhost/lomba_v2/app/action/verification.php?selector=$selector&token=$token";

            // kirim email OTP
            $mail = new PHPMailer(true);
            try {
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
                $mail->addAddress($_POST['email']);

                $mail->Subject = 'Verifikasi Email';
                $mail->Body = "Halo {$_POST['username']},
                    Terima kasih sudah mendaftar di CampusImpact
                    Klik link berikut untuk verifikasi akun:
                    $verifyLink";

                $mail->send();

                $_SESSION['data_user'] = [
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'tipePengguna' => $_POST['tipePengguna']
                ];
            } catch (Exception $e) {
                $_SESSION['flash'] = ['type' => 'error', 'title' => 'Email gagal dikirim', 'text' => 'Email verifikasi gagla dikirim! Silakan coba lagi nanti.'];
                header('Location: ../form_register.php');
                exit;
            }
        });

        if ($_POST['role'] == 'mahasiswa') {
            $auth->admin()->addRoleForUserById($userId, CustomRole::STUDENT);
        } elseif ($_POST['role'] == 'umum') {
            $auth->admin()->addRoleForUserById($userId, CustomRole::PARTNER);
        }

        header('Location: ../verify.php');
        exit;
    } catch (\Delight\Auth\InvalidEmailException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'title' => 'Email tidak valid', 'text' => 'Silakan masukkan email yang benar'];
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'title' => 'Password lemah', 'text' => 'Gunakan password yang lebih kuat'];
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'title' => 'User sudah ada', 'text' => 'Gunakan email lain untuk registrasi'];
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = ['type' => 'warning', 'title' => 'Terlalu banyak percobaan', 'text' => 'Coba lagi nanti setelah beberapa saat'];
    }

    header('Location: ../form_register.php');
    exit;
}
