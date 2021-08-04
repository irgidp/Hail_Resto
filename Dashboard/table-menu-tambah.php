<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambah"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahMenu($_POST) > 0) {

        echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-menu';
		</script>
		";
    } else {
        echo "
		<script>
			alert('data gagal ditambahkan!');
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
        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="id_menu" class="col-form-label">Id Menu</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="id_menu" name="id_menu" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="nama_menu" class="col-form-label">Nama menu</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="nama_menu" name="nama_menu" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="desc_menu" class="col-form-label">Desc</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="desc_menu" name="desc_menu" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="bahan" class="col-form-label rounded-pill">Bahan</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="bahan" name="bahan" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="harga" class="col-form-label">Harga</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="harga" name="harga" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="kategori" class="col-form-label">Kategori</label>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control rounded-pill" id="kategori" name="kategori" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="row align-items-center cus-form">
            <div class="col-sm-2 ">
                <label for="gambar" class="col-form-label">Gambar</label>
            </div>
            <div class="col-sm-3">
                <input type="file" class="form-control rounded-pill" id="gambar" name="gambar" aria-describedby="emailHelp">
            </div>
        </div>

        <button type="submit" class="btn btn-success rounded-pill btn-tambah" name="tambah">Tambah</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->