<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $auth->forgotPassword($_POST['email'], function ($selector, $token) {
            $link = 'http://localhost/lomba_v2/app/form_reset.php?selector=' . urlencode($selector) . '&token=' . urlencode($token);
            
            // kirim email ke user (gunakan PHPMailer)
            $mail = new PHPMailer(true);
            try {
                $email = $_POST['email'];

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
                $mail->Subject = 'Reset password email';
                $mail->Body = "Halo {$_SESSION['username']},
                Kamu meminta link untuk reset password.
                Klik link berikut untuk reset password akun kamu
                $link";

                $mail->send();
            } catch (Exception $e) {
                error_log("Email gagal dikirim: {$mail->ErrorInfo}");
            }
        });

        $_SESSION['flash'] = [
            'type' => 'success',
            'title' => 'Email Terkirim',
            'text'  => 'Silakan cek email Anda untuk reset password'
        ];
    } catch (\Delight\Auth\InvalidEmailException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Gagal',
            'text'  => 'Email tidak terdaftar'
        ];
    } catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Gagal',
            'text'  => 'Email belum diverifikasi'
        ];
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Gagal',
            'text'  => 'Terlalu banyak percobaan, coba lagi nanti'
        ];
    }

    header('Location: ../form_forgot.php');
    exit;
}
