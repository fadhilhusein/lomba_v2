<?php
include "config/db.php"
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
                <!-- Main page content-->

                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Extended DataTables</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Author</th>

                                        <th>Tagline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>

                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Membuat Website Toko Online Sederhana
                                        </td>
                                        <td>Edinburgh</td>

                                        <td>
                                            <div class="badge bg-primary text-white rounded-pill">front-End</div>
                                        </td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pencil"></i></i></button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Membuat Website Toko Online Sederhana
                                        </td>
                                        <td>Singapore</td>

                                        <td>
                                            <div class="badge bg-primary text-white rounded-pill">front-End</div>
                                        </td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pencil"></i></button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Membuat Website Toko Online Sederhana
                                        </td>
                                        <td>New York</td>

                                        <td>
                                            <div class="badge bg-secondary text-white rounded-pill">UI/UX</div>
                                        </td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pencil"></i></button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                <script src="js/datatables/datatables-simple-demo.js"></script>
</body>

</html>