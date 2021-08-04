<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$pegawai = query("SELECT * FROM pegawai");


?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Pegawai Hail Resto</h1>
    <div class="row d-flex justify-content-between">
        <div class="col-4">
            <form action="">
                <div class="form-group">
                    <input type="seacrh" class="form-control rounded-pill form-cuss-search" id="exampleFormControlInput1" placeholder="Masukan Keyword Pencarian">

                </div>
            </form>
        </div>
        <div class="col-4 justify-content-end">
            <a type="button" class="btn btn-success rounded-pill" href="index.php?halaman=table-pegawai-tambah">Tambah</a>
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
                            <th>Nama Pegawai</th>
                            <th>Telp</th>
                            <th>Jabatan</th>
                            <th>Jenis Kelamin </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($pegawai as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_pegawai'] ?></td>
                            <td><?= $row['jabatan'] ?></td>
                            <td><?= $row['jk'] ?></td>
                            <td><?= $row['telp'] ?></td>
                            <td>
                                <a href="index.php?halaman=table-pegawai-edit&id_pegawai=<?= $row['id_pegawai'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                                <a href="index.php?halaman=table-pegawai-hapus&id_pegawai=<?= $row['id_pegawai'] ?>" class="fa fa-trash btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
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