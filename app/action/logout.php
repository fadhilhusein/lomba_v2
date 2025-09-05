<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $auth->logOut();

        header("Location: ../form_login.php");
        exit;
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
}
