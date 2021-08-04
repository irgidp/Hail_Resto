<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$menu = query("SELECT * FROM menu");


?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Dashboard Menu Hail Resto</h1>
            <div class="row d-flex justify-content-between">
                <div class="col-4">
                    <form action="">
                        <div class="form-group">
                            <input type="seacrh" class="form-control rounded-pill form-cuss-search" id="exampleFormControlInput1" placeholder="Masukan Keyword Pencarian">

                        </div>
                    </form>
                </div>
                <div class="col-4 justify-content-end">

                    <a type="button" class="btn btn-success rounded-pill" href="index.php?halaman=table-menu-tambah">Tambah</a>
                </div>
            </div>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama menu</th>
                                    <th>Desc</th>
                                    <th>Bahan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><img src="../assets/img/<?= $row["gambar"]; ?>" width="50"></td>
                                    <td><?= $row['nama_menu'] ?></td>
                                    <td><?= $row['deskripsi'] ?></td>
                                    <td><?= $row['bahan'] ?></td>
                                    <td><?= $row['harga'] ?></td>
                                    <td>
                                        <a href="index.php?halaman=table-menu-edit&id_menu=<?= $row['id_menu'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                                        <a href="index.php?halaman=table-menu-hapus&id_menu=<?= $row['id_menu'] ?>" class="fa fa-trash btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->