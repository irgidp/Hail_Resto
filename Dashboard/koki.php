<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "functions.php";

$pesanan = query("SELECT * FROM pesanan,menu where pesanan.id_menu=menu.id_menu and pesanan.status=0");
$pesanan_done = query("SELECT * FROM pesanan,menu where pesanan.id_menu=menu.id_menu and pesanan.status=1");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/koki.css">

    <title>Koki</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-light py-5">
            <div class="container">
                <a class="navbar-brand img" href="#">
                    <img src="assets/img/logo.png" alt="">
                </a>
            </div>
        </nav>
    </section>
    <div class="div py-5">

    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn btn-lg q-btn text-left disabled">Queuing Order</button>
                </div>
                <?php foreach ($pesanan as $row) : ?>
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                            <img src="../assets/img/<?= $row["gambar"]; ?>" class="card-img-top position-absolute top-0 start-50 translate-middle" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["nama_pemesan"]; ?></h5>
                                <div class="card-title d-inline">
                                    <?= $row["nama_menu"]; ?>
                                    <a href="#" class="btn jml-btn rounded-circle"><?= $row["jml_pesanan"]; ?></a>
                                </div>
                                <div class="text-end d-inline position-absolute top-50 end-0 translate-middle-y pe-3">

                                </div>
                                <div class="text-center"><a href="progress.php?no_pesanan=<?= $row['no_pesanan']; ?>" class="btn q2-btn">On Progress</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-md-12">
                    <button type="button" class="btn btn btn-lg c-btn text-left disabled">Completed</button>
                </div>
                <?php foreach ($pesanan_done as $row) : ?>
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                            <img src="../assets/img/<?= $row["gambar"]; ?>" class="card-img-top position-absolute top-0 start-50 translate-middle" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["nama_pemesan"]; ?></h5>
                                <div class="card-title d-inline">
                                    <?= $row["nama_menu"]; ?>
                                    <a href="#" class="btn jml-btn rounded-circle"><?= $row["jml_pesanan"]; ?></a>
                                </div>
                                <div class="text-center"><a href="done.php?no_pesanan=<?= $row['no_pesanan']; ?>" class="btn c2-btn">Done</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div> <a href="logout.php" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none" aria-expanded="false">
            <i class="bi bi-box-arrow-right"></i>LogOut
        </a>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>