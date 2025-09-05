<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $auth->forgotPassword($_POST['email'], function ($selector, $token) {
            $link = 'http://localhost/lomba_v2/app/reset.php?selector=' . urlencode($selector) . '&token=' . urlencode($token);

            // kirim email ke user (gunakan PHPMailer)
            // contoh sederhana
            mail($_POST['email'], 'Reset Password', "Klik link berikut untuk reset password: $link");
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

    header('Location: ../forgot.php');
    exit;
}
