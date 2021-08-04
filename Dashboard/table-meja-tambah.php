<?php
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambah"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahMeja($_POST) > 0) {

        echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
    } else {
        echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold" style="color: black;">Dashboard Tambah Meja Hail Resto</h3>
    <div class="col-lg-5">
        <form class="mt-5" action="" method="post">
            <div class="form-group row">
                <label for="no_meja" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">No Meja</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill" id="no_meja" name="no_meja">
                </div>
            </div>
            <div class="form-group row">
                <label for="kapasitas" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">Kapasitas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill " id="kapasitas" name="kapasitas">
                </div>
            </div>
            <div class="form-group row">
                <label for="stat" class="col-sm-4 col-form-label font-weight-bold" style="color: black;">Stat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill" id="stat" name="stat">
                </div>


            </div>
            <div class="col-sm-12">
                <button class="btn btn-success float-right rounded-pill" name="tambah">Tambah</button>
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

<!-- Scroll to Top Button-->