<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // login pakai email/username + password
        $auth->login($_POST['email'], $_POST['password']);

        // redirect kalau sukses
        $_SESSION['flash'] = [
            'type' => 'success',
            'title' => 'Login Berhasil',
            'text'  => 'Selamat datang kembali!'
        ];
        header('Location: ../index.php');
        exit;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Login gagal',
            'text'  => 'Email yang anda masukan salah!'
        ];
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Login gagal',
            'text'  => 'Password yang anda masukan salah!'
        ];
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Login gagal',
            'text'  => 'Email belum diverifikasi. Silakan cek inbox Anda!'
        ];
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Login gagal',
            'text'  => 'Terlalu banyak percobaan login. Coba lagi nanti.!'
        ];
    }
}
?>
