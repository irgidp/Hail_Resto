<?php

$id_pegawai = $_GET["id_pegawai"];

if (hapusPegawai($id_pegawai) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-pegawai';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-pegawai';
		</script>
		";
}
