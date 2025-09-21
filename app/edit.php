<?php
// Sertakan file koneksi database dan otentikasi
include "config/db.php";
include "libs/php/auth.php";

// Pastikan pengguna sudah login
loginState();

// Tangkap ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Jika ID tidak ada atau kosong, alihkan kembali ke halaman dashboard
if (!$id) {
    header("Location: dashboard.php");
    exit();
}

// Logika untuk memproses form saat dikirim (metode POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data yang dikirim dari form
    $newTitle = $_POST['title'];
    $newAuthor = $_POST['author'];
    $newTagline = $_POST['tagline'];

    try {
        // Query untuk memperbarui data di database
        $stmt = $pdo->prepare("UPDATE articles SET title = ?, author = ?, tagline = ? WHERE id = ?");
        $stmt->execute([$newTitle, $newAuthor, $newTagline, $id]);

        // Alihkan kembali ke halaman dashboard dengan pesan sukses
        header("Location: dashboard.php?status=success_edit");
        exit();
    } catch (PDOException $e) {
        // Jika ada error, alihkan dengan pesan error
        header("Location: dashboard.php?status=error_edit");
        exit();
    }
}

// Ambil data artikel dari database untuk ditampilkan di form
try {
    $stmt = $pdo->prepare('SELECT id, title, author, tagline FROM articles WHERE id = ?');
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika artikel tidak ditemukan, alihkan kembali ke dashboard
    if (!$article) {
        header("Location: dashboard.php");
        exit();
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Artikel - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/create.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
</head>

<body class="nav-fixed">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-xl px-4">
                    <div class="container">
                        <div class="form-card">
                            <h2 class="title">Edit Data</h2>
                            <p class="subtitle">Perbarui informasi data artikel</p>

                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']); ?>">

                                <div class="form-group">
                                    <label for="tagline">Tagline</label>
                                    <select id="tagline" name="tagline" class="form-control">
                                        <option value="">Pilih Tagline</option>
                                        <option value="Web Development" <?php echo ($article['tagline'] == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
                                        <option value="UI/UX" <?php echo ($article['tagline'] == 'UI/UX') ? 'selected' : ''; ?>>UI/UX</option>
                                        <option value="Design" <?php echo ($article['tagline'] == 'Design') ? 'selected' : ''; ?>>Design</option>
                                        <option value="Copy Writing" <?php echo ($article['tagline'] == 'Copy Writing') ? 'selected' : ''; ?>>Copy Writing</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul konten..." value="<?php echo htmlspecialchars($article['title']); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" id="author" name="author" class="form-control" placeholder="Masukkan nama author..." value="<?php echo htmlspecialchars($article['author']); ?>" required>
                                </div>

                                <button type="submit" class="submit-button">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>