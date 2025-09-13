<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $auth->resetPassword($_POST['selector'], $_POST['token'], $_POST['password']);

        $_SESSION['flash'] = [
            'type' => 'success',
            'title' => 'Password Berhasil Diganti',
            'text'  => 'Silakan login dengan password baru Anda'
        ];
        header('Location: ../form_reset.php');
        exit;
    } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Password Gagal Diganti',
            'text'  => 'Token tidak valid atau sudah kadaluarsa!'
        ];
    } catch (\Delight\Auth\TokenExpiredException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Password Gagal Diganti',
            'text'  => 'Token sudah kadaluarsa!'
        ];
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Password Gagal Diganti',
            'text'  => 'Password baru tidak valid!'
        ];
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'title' => 'Password Gagal Diganti',
            'text'  => 'Terlalu banyak percobaan, coba lagi nanti!'
        ];
    }
    header('Location: ../form_reset.php');
    exit;
}
