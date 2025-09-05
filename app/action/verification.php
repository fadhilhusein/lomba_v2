<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . "/../config/db.php";

if (isset($_GET['selector'], $_GET['token'])) {
    try {
        $auth->confirmEmail($_GET['selector'], $_GET['token']);

        $_SESSION['flash'] = [
            'type' => 'success',
            'title' => 'Verifikasi berhasil',
            'text'  => 'Email Anda sudah terverifikasi, silakan login'
        ];
    }
    catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        $_SESSION['flash'] = ['type'=>'error','title'=>'Link salah','text'=>'Token atau selector tidak valid'];
    }
    catch (\Delight\Auth\TokenExpiredException $e) {
        $_SESSION['flash'] = ['type'=>'error','title'=>'Token kadaluarsa','text'=>'Silakan request verifikasi baru'];
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $_SESSION['flash'] = ['type'=>'warning','title'=>'Sudah verifikasi','text'=>'Akun ini sudah diverifikasi'];
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $_SESSION['flash'] = ['type'=>'warning','title'=>'Terlalu banyak percobaan','text'=>'Coba lagi nanti'];
    }
}

header('Location: ../form_login.php');
exit;
