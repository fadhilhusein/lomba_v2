<?php
include "config/db.php";
include "libs/php/auth.php";

loginState();

// Tambahkan kode ini untuk menampilkan SweetAlert
if (isset($_GET['status']) && $_GET['status'] == 'success_edit') {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data artikel berhasil diperbarui.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
    ";
}

$username = $auth->getUsername();
$email = $auth->getEmail();

try {
    $stmt = $pdo->query('SELECT id, title, author, tagline FROM articles ORDER BY created_at DESC');
    $articles = $stmt->fetchAll();
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
    <title>Overview - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
</head>

<body class="nav-fixed">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container d-flex justify-content-start px-4 mt-5">
                    <h1>Dashboard</h1>
                </div>
                <div class="container-xl px-4 mt-5">
                    <div class="card mb-4">
                        <div class="card-header">Extended DataTables</div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th>Tagline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($articles)): ?>
                                        <?php foreach ($articles as $article): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($article['id']); ?></td>
                                                <td><?php echo htmlspecialchars($article['title']); ?></td>
                                                <td><?php echo htmlspecialchars($article['author']); ?></td>
                                                <td>
                                                    <div class="badge bg-primary text-white rounded-pill"><?php echo htmlspecialchars($article['tagline']); ?></div>
                                                </td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo htmlspecialchars($article['id']); ?>" class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pencil"></i></a>
                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark delete-btn" data-id="<?php echo htmlspecialchars($article['id']); ?>"><i class="fa-regular fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Tidak ada data yang ditemukan.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="js/datatables/datatables-simple-demo.js"></script>
            <script src="js/dashboard.js"></script>
        </div>
    </div>
</body>

</html>