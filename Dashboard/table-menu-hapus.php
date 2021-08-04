<?php

$id_menu = $_GET["id_menu"];

if (hapusMenu($id_menu) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-menu';
		</script>
		";
} else {
    echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-menu';
		</script>
		";
}
