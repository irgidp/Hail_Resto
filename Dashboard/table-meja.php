<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$meja = query("SELECT * FROM meja");


?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold" style="color: black;">Dashboard Meja Hail Resto</h3>

    <div class="d-flex justify-content-between mt-5">
        <input type="text" class="form-control w-25 rounded-pill" placeholder="Masukkan Keyword Pencarian...">
        <a type="button" class="btn btn-success rounded-pill" href="index.php?halaman=table-meja-tambah">Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($meja as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['no_meja'] ?></td>
                            <td><?= $row['kapasitas'] ?></td>
                            <td><?= $row['stat'] ?></td>
                            <td>
                                <a href="index.php?halaman=table-meja-edit&no_meja=<?= $row['no_meja'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                                <a href="index.php?halaman=table-meja-hapus&no_meja=<?= $row['no_meja'] ?>" class="fa fa-trash btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->