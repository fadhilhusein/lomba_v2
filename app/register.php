<?php
session_start();
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

            $_SESSION['flash'] = [
                'type' => 'success',
                'title' => 'Registrasi berhasil!',
                'text'  => "User baru dibuat dengan ID: {$userId}. Silahkan cek email untuk OTP!"
            ];

            header('Location: form_register.php');
            exit;
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            echo 'Email sudah terdaftar';
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            $_SESSION['flash'] = [
            'type' => 'warning',
            'title' => 'Terlalu banyak percobaan',
            'text'  => 'Coba lagi nanti setelah beberapa saat'
        ];
        } catch (Exception $e) {
            echo 'Gagal mengirim email: ' . $e->getMessage();
        }

        header('Location: form_register.php');
        exit;
    }
}
