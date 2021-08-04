<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }

// ambil data di URL
$id_pegawai = $_GET["id_pegawai"];

// query data mahasiswa berdasarkan IdBarang
$pegawai = query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'")[0];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["editPegawai"])) {
    // var_dump($_POST);
    // die;
    // cek apakah data berhasil diubah atau tidak
    if (editPegawai($_POST) > 0) {
        echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-pegawai';
		</script>
		";
    } else {
        echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-pegawai';
		</script>
		";
    }
}
?>

<div class="container-fluid">

    <h3 class="font-weight-bold" style="color: black;">Dashboard Tambah Pegawai Hail Resto</h3>



    <form action="" method="POST">
        <div class="row align-items-center cus-form">
            <input type="hidden" name="id_pegawai" value="<?= $pegawai["id_pegawai"] ?>">
            <div class="col-sm-2 ">
                <label for="id_pegawai" class="col-form-label">Id Pegawai</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="id_pegawai" name="id_pegawai" value="<?= $pegawai["id_pegawai"] ?>" readonly>
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="nama_pegawai" class="col-form-label">Nama Pegawai</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai["nama_pegawai"] ?>">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="telp" class="col-form-label">Telp</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="telp" name="telp" value="<?= $pegawai["telp"] ?>">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="jabatan" class="col-form-label rounded-pill">jabatan</label>
            </div>
            <div class="col-sm-3">
                <input type="jabatan" class="form-control rounded-pill" id="jabatan" name="jabatan" value="<?= $pegawai["jabatan"] ?>">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="jk" class="col-form-label">Jenis Kelamin</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="jk" name="jk" value="<?= $pegawai["jk"] ?>">
            </div>
        </div>


        <button type="submit" class="btn btn-success rounded-pill btn-tambah" name="editPegawai">Tambah</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->