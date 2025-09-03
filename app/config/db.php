<?php
$host = "sql12.freesqldatabase.com";
$dbname = "sql12797040";
$username = "sql12797040";   // sesuaikan dengan user MySQL kamu
$password = "sh4zQJl3vb";       // isi kalau ada password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Atur mode error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi berhasil!";
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>