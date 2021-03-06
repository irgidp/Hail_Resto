<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
ob_start();
require "functions.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hail Resto</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- custom css -->
    <link href="../assets/css/edit.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav cus-side sidebar sidebar-dark accordion shadow-sm" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <!-- Logo Hail Resto -->

                <!--  -->

                <div class="sidebar-brand-text mx-3 sidebar-cus">Hail Resto</div>
            </a>
            <a href="" class="d-flex align-items-center justify-content-center bot-side-cus">Restonya Hail Hydra</a>


            <!-- Divider -->
            <div class="dropdown-divider"></div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link " href="index.php">
                    <span class="sidebar-cus ">Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=table-menu">
                    <span class="sidebar-cus">Menu</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=table-meja">
                    <span class="sidebar-cus">Meja</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=table-pegawai">
                    <span class="sidebar-cus">Pegawai</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=backup">
                    <span class="sidebar-cus">Pemasukan</span></a>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <img src="../assets/img/logo.png" class="float-left img-cuss" alt="...">
                    <a href="" class="mr-nav">Mr.Hail Resto <br><span>Administrasi hail Resto</span></a>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="content" style="height: 80vh;">
                    <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman'] == 'table-menu') {
                            include 'table-menu.php';
                        } else if ($_GET['halaman'] == 'table-meja') {
                            include 'table-meja.php';
                        } else if ($_GET['halaman'] == 'table-pegawai') {
                            include 'table-pegawai.php';
                        } else if ($_GET['halaman'] == 'table-menu-tambah') {
                            include 'table-menu-tambah.php';
                        } else if ($_GET['halaman'] == 'table-menu-edit') {
                            include 'table-menu-edit.php';
                        } else if ($_GET['halaman'] == 'table-menu-hapus') {
                            include 'table-menu-hapus.php';
                        } else if ($_GET['halaman'] == 'table-meja-tambah') {
                            include 'table-meja-tambah.php';
                        } else if ($_GET['halaman'] == 'table-meja-edit') {
                            include 'table-meja-edit.php';
                        } else if ($_GET['halaman'] == 'table-meja-hapus') {
                            include 'table-meja-hapus.php';
                        } else if ($_GET['halaman'] == 'table-pegawai-tambah') {
                            include 'table-pegawai-tambah.php';
                        } else if ($_GET['halaman'] == 'table-pegawai-edit') {
                            include 'table-pegawai-edit.php';
                        } else if ($_GET['halaman'] == 'table-pegawai-hapus') {
                            include 'table-pegawai-hapus.php';
                        } else if ($_GET['halaman'] == 'backup') {
                            include 'backup.php';
                        }
                    } else {
                        include 'dashboard.php';
                    }
                    ?>
                </div>



            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
<?php ob_flush(); ?>