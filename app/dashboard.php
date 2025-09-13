<?php
include "config/db.php";
include "libs/php/auth.php";

loginState();

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
</head>

<body class="nav-fixed sidenav-toggled">
    <?php include_once "../components/Topbar.php" ?>
    <div id="layoutSidenav">
        <?php include_once "../components/Sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-center mt-5">
                    <h1>Dashboard</h1>
                </div>
                <div class="container-xl px-4 mt-n10">
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const table = document.getElementById('datatablesSimple');

                    table.addEventListener('click', function(event) {
                        const targetButton = event.target.closest('.delete-btn');

                        if (targetButton) {
                            Swal.fire({
                                title: 'Apakah kamu yakin?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire(
                                        'Dihapus!',
                                        'File Anda telah dihapus.',
                                        'success'
                                    );
                                    // Kode AJAX untuk menghapus data dari database
                                    // const articleId = targetButton.dataset.id;
                                    // fetch('delete.php', {
                                    //     method: 'POST',
                                    //     headers: { 'Content-Type': 'application/json' },
                                    //     body: JSON.stringify({ id: articleId })
                                    // })
                                    // .then(response => response.json())
                                    // .then(data => {
                                    //     if (data.status === 'success') {
                                    //         // Remove the row from the table
                                    //         targetButton.closest('tr').remove();
                                    //     } else {
                                    //         Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                                    //     }
                                    // });
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>