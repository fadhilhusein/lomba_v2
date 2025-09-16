<?php
// Sertakan file koneksi database dan otentikasi
include "config/db.php";
include "libs/php/auth.php";

loginState();

// Tetapkan header untuk memberitahu browser bahwa respons adalah JSON
header('Content-Type: application/json');

// Ambil data yang dikirimkan melalui permintaan POST
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? null;

// Periksa apakah ID ada
if ($id) {
    try {
        // Gunakan prepared statement untuk keamanan
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->execute([$id]);

        // Kirim respons sukses dalam format JSON
        echo json_encode(['status' => 'success', 'message' => 'Artikel berhasil dihapus.']);
    } catch (PDOException $e) {
        // Tangani error dan kirim respons error
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus artikel: ' . $e->getMessage()]);
    }
} else {
    // Jika ID tidak ada, kirim respons error
    echo json_encode(['status' => 'error', 'message' => 'ID artikel tidak ditemukan.']);
}
?>