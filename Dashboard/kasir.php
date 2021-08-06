<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "functions.php";

$pesanan = query("SELECT * FROM pesanan,menu where pesanan.id_menu=menu.id_menu");
$jsArray = "var prdName = new Array();\n";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/kasir.css">

    <title>Kasir</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-light py-5">
            <div class="container">
                <a class="navbar-brand img" href="#">
                    <img src="../assets/img/logo.png" alt="">
                </a>
            </div>
        </nav>
    </section>

    <section class="container" style="margin-top: 150px;">
        <form action="" method="POST">
            <div class="col-lg-4">
                <select class="form-select form1" name="pesanan" aria-label="Default select example" name="prdId" onchange="changeValue(this.value)">
                    <option selected>Atas Nama</option>
                    <?php
                    foreach ($pesanan as $row) {
                        echo "<option value=\"" . $row['no_pesanan'] . "\">" . $row['nama_pemesan']  . "</option>";
                        // $jsArray .= "prdName['" . $row['no_pesanan'] . "'] = '" . addslashes($row['nama_pemesan']) . "';\n";
                        $jsArray .= "prdName['" . $row['no_pesanan'] . "'] = 
                            {
                                name:'" . addslashes($row['nama_pemesan']) . "',
                                meja:'" . addslashes($row['no_meja']) . "',
                                harga:'" . addslashes($row['harga']) . "',
                                jumlah:'" . addslashes($row['jml_pesanan']) . "',
                                menu:'" . addslashes($row['nama_menu']) . "',

                            };\n";
                    }
                    ?>
                </select>
            </div>
        </form>

        <div class="col-lg-6 mt-5">
            <div class="card shadow-sm p-3 mb-5 bg-body" style="border-radius: 25px;">
                <div class="card-body fw-bold">
                    <div class="d-flex justify-content-between px-4">
                        <p><input style="border-style: none;" type="text" name="prod_name" id="prd_name" /></p>
                        <p>Meja <input style="border-style: none;" type="text" name="prod_meja" id="prd_meja" /></p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between px-4">
                        <p><input style="border-style: none;" type="text" name="prod_menu" id="prd_menu" /></p>
                        <p><input style="border-style: none;" type="text" name="prod_harga" id="prd_harga" /></p>
                    </div>
                    <div class="d-flex justify-content-between px-4">
                        <p>Jumlah</p>
                        <p><input style="border-style: none;" type="text" name="prod_jumlah" id="prd_jumlah" /></p>

                    </div>
                    <hr>
                    <div class="d-flex justify-content-between px-4">
                        <p>Total</p>
                        <p><input style="border-style: none;" type="text" name="prod_total" id="total" /></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input class="form-control w-50 rounded-pill" type="text" placeholder="Masukkan Pembayaran" name="pembayaran" id="pembayaran">
                        <button class="btn btn-warning rounded-pill" style="width: 124px;" name="progress" onclick="pembayaran()">Process</button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between px-4">
                        <p>Change</p>
                        <p><input style="border-style: none;" type="text" id="kembalian" name="kembalian" /></p>
                    </div>
                    <button class="btn btn-success float-end rounded-pill" style="width: 124px;">Done</button>
                </div>
            </div>
        </div>
        <div> <a href="logout.php" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none" aria-expanded="false">
                <i class="bi bi-box-arrow-right"></i>LogOut
            </a>
        </div>
        <script type="text/javascript">
            <?php echo $jsArray; ?>

            function changeValue(id) {
                document.getElementById('prd_name').value = prdName[id].name;
                document.getElementById('prd_meja').value = prdName[id].meja;
                document.getElementById('prd_harga').value = prdName[id].harga;
                document.getElementById('prd_jumlah').value = prdName[id].jumlah;
                document.getElementById('prd_menu').value = prdName[id].menu;

                var harga = Number(document.getElementById('prd_harga').value = prdName[id].harga);
                var jumlah = Number(document.getElementById('prd_jumlah').value = prdName[id].jumlah);
                var total = harga * jumlah;
                document.getElementById('total').value = total;

                // var pembayaran = document.getElementById('pembayaran').value;
                // var kembalian = total - pembayaran;
                // document.getElementById('kembalian').value = kembalian;

            };

            function pembayaran() {
                var harga = Number(document.getElementById('prd_harga').value = prdName[id].harga);
                var jumlah = Number(document.getElementById('prd_jumlah').value = prdName[id].jumlah);
                var total = harga * jumlah;
                document.getElementById('total').value = total;

                var pembayaran = document.getElementById('pembayaran').value;

                var kembalian = total - pembayaran;
                document.getElementById('kembalian').innerHTML = kembalian;
                alert('kembalian');
                console.log('pembayaran');
            }
        </script>
    </section>
</body>

</html>