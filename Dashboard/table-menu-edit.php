<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }

// ambil data di URL
$id_menu = $_GET["id_menu"];

// query data mahasiswa berdasarkan IdBarang
$menu = query("SELECT * FROM menu WHERE id_menu = '$id_menu'")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["editMenu"])) {
    // var_dump($_POST);
    // die;
    // cek apakah data berhasil diubah atau tidak
    if (editMenu($_POST) > 0) {
        echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-menu';
		</script>
		";
    } else {
        echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-menu';
		</script>
		";
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <h3 class="font-weight-bold" style="color: black;">Dashboard Tambah Menu Hail Resto</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_menu" value="<?= $menu["id_menu"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $menu["gambar"] ?>">
        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="nama_menu" class="col-form-label">Nama menu</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="nama_menu" name="nama_menu" value="<?= $menu["nama_menu"] ?>">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="desc_menu" class="col-form-label">Desc</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="desc_menu" name="desc_menu" value="<?= $menu["deskripsi"] ?>">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="bahan" class="col-form-label rounded-pill">Bahan</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="bahan" name="bahan" aria-describedby="emailHelp" value="<?= $menu["bahan"] ?>">
            </div>
        </div>

        <div class=" row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="harga" class="col-form-label">Harga</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="harga" name="harga" aria-describedby="emailHelp" value="<?= $menu["harga"] ?>">
            </div>
        </div>

        <div class=" row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="kategori" class="col-form-label">Kategori</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="kategori" name="kategori" aria-describedby="emailHelp" value="<?= $menu["kategori"] ?>">
            </div>
        </div>

        <div class=" row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="gambar" class="col-form-label">Gambar</label>
            </div>

            <div class="col-sm-3">
                <img src="../assets/img/<?= $menu['gambar']; ?>" width="70"><br>
                <input type="file" class="form-control rounded-pill" id="gambar" name="gambar" aria-describedby="emailHelp">
            </div>
        </div>

        <button type="submit" class="btn btn-success rounded-pill btn-tambah" name="editMenu">Simpan</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->