<?php
require 'functions.php';
$no_pesanan = $_GET["no_pesanan"];

if (pesananDone($no_pesanan) > 0) {
    echo "
		<script>
			alert('Pesanan selesai');
			document.location.href = 'koki.php';
		</script>
		";
} else {
    echo "
		<script>
			alert('Pesanan belum selesai');
			document.location.href = 'koki.php';
		</script>
		";
}
