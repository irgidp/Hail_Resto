<?php

$no_meja = $_GET["no_meja"];

if (hapusMeja($no_meja) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
} else {
    echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-meja';
		</script>
		";
}
