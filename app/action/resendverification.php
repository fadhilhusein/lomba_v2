<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['data_user']['email'];

    try {
        $auth->resendConfirmationForEmail($email, function ($selector, $token) use ($email) {
            $verifyLink = "http://localhost/lomba_v2/app/action/verification.php?selector=$selector&token=$token";

            // ==== Kirim Email Verifikasi ====
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'muhammad.fadhil.syahrian@gmail.com';
                $mail->Password = $_ENV['EMAIL_PASS']; // gunakan App Password Gmail
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('muhammad.fadhil.syahrian@gmail.com', 'CampusImpact');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Resend Verifikasi Email';
                $mail->Body = "Halo {$_SESSION['username']},
                Kamu meminta link verifikasi baru.
                Klik link berikut untuk verifikasi akun
                $verifyLink";

                $mail->send();
            } catch (Exception $e) {
                error_log("Email gagal dikirim: {$mail->ErrorInfo}");
            }
        });

        $_SESSION['flash'] = [
            'type' => 'success',
            'title' => 'Email terkirim',
            'text'  => 'Link verifikasi baru sudah dikirim ke email kamu'
        ];
    } catch (\Delight\Auth\ConfirmationRequestNotFound $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Tidak ditemukan',
            'text'  => "Email {$_SESSION['data_user']['email']} belum pernah mendaftar atau sudah diverifikasi"
        ];
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = [
            'type' => 'warning',
            'title' => 'Terlalu banyak permintaan',
            'text'  => 'Coba lagi nanti setelah beberapa saat'
        ];
    }

    header('Location: ../verify.php');
    exit;
}
