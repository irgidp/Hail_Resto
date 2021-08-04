<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }

// ambil data di URL
$no_meja = $_GET["no_meja"];

// query data mahasiswa berdasarkan IdBarang
$meja = query("SELECT * FROM meja WHERE no_meja = '$no_meja'")[0];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["editMeja"])) {
    // var_dump($_POST);
    // die;
    // cek apakah data berhasil diubah atau tidak
    if (editMeja($_POST) > 0) {
        echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
    } else {
        echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold" style="color: black;">Dashboard Edit Meja Hail Resto</h3>
    <div class="col-lg-5">
        <form class="mt-5" action="" method="post">
            <input type="hidden" name="no_meja" value="<?= $meja["no_meja"] ?>">
            <div class="form-group row">
                <label for="no_meja" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">No Meja</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill" id="no_meja" name="no_meja" value="<?= $meja["no_meja"] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="kapasitas" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">Kapasitas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill " id="kapasitas" name="kapasitas" value="<?= $meja["kapasitas"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="stat" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">Status</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill" id="stat" name="stat" value="<?= $meja["stat"] ?>">
                </div>


            </div>
            <div class="col-sm-12">
                <button class="btn btn-success float-right rounded-pill" name="editMeja">Simpan</button>
            </div>

        </form>
    </div>


    </tbody>
    </table>
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