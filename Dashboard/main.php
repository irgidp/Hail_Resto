<?php 
    session_start();
    require "functions.php";
    $menuFood = query("SELECT * FROM menu WHERE kategori='Food'");
    $menuDrink = query("SELECT * FROM menu WHERE kategori='Drink'");
    $menuDessert = query("SELECT * FROM menu WHERE kategori='Dessert'");

    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_SESSION["shooping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shooping_cart"], "item_id");
            if(!in_array($_GET["id_menu"], $item_array_id))
            {
                $count = count($_SESSION["shooping_cart"]);
                $item_array = array(
                    'item_id'  => $_GET["id_menu"],
                    'item_nama' => $_POST["hidden_name"],
                    'item_harga' => $_POST["hidden_harga"],
                    'item_quantity' => $_POST["quantity"]
                );
                $_SESSION["shooping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item sudah ada, hapus terlebih dahulu untuk menambah pesanan!");</script>';
                echo '<script>window.location="main.php"</script>';
            }
        }else
        {   
            $item_array = array(
                'item_id'  => $_GET["id_menu"],
                'item_nama' => $_POST["hidden_name"],
                'item_harga' => $_POST["hidden_harga"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shooping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shooping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id_menu"])
                {
                    unset($_SESSION["shooping_cart"][$keys]);
                    echo '<script>alert("Item Dihapus");</script>';
                    echo '<script>window.location="main.php"</script>';
                }
            }
        }
    }

    $meja = query("SELECT * FROM meja");

    if (isset($_POST["tambahOrder"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (tambahPesanan($_POST) > 0) {
    
            echo "
            <script>
                alert('Pesanan berhasil! Silahkan melakukan pembayaran!');
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pesanan gagal!');
                // document.location.href = 'main.php';
            </script>
            ";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Main</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Left Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 sticky-md-top" style="width: 4.5rem;">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <a href="#" class="nav-link py-3 border-bottom" data-bs-placement="right">
                    <i class="bi bi-house-door"></i>
                </a>
            </ul>
            <div class="border-top">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none"
                    aria-expanded="false">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="b-example-divider sticky-md-top"></div>
        <!-- End Left Sidebar -->

        <!-- Main Container -->
        <div class="container-fluid">
            <div class="row d-flexc">

                <div class="col-md-4">
                    <h3 class="mx-5 mt-5">Today Menu</h3>
                </div>
                <div class="col-md-6">
                    <div class="searchbar mx-5 mt-5">
                        <input class="search_input" type="text" name="" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>
                <div class="col-md-2">
                </div>

                <div class="col-md-6">
                    <img src="../assets/img/Banner.png" alt="" width="900px">
                </div>
                <div class="col-md-6">
                </div>

                <div class="col-lg-4">
                    <h3 class="mx-5 mt-3">Menu Category</h3>
                </div>
                <div class="col-lg-8">
                </div>

                <ul class="nav nav-pills mb-3 mt-3 ms-5 " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-menu" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            <div class="card card-menu" style="width: 120px;">
                                <img src="../assets/img/food.png" class="card-img-top w-50 mx-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark">Food</h5>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-menu" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">
                            <div class="card card-menu" style="width: 120px;">
                                <img src="../assets/img/drink.png" class="card-img-top w-50 mx-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark">Drink</h5>
                                </div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-menu" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">
                            <div class="card card-menu" style="width: 120px;">
                                <img src="../assets/img/dessert.png" class="card-img-top w-50 mx-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark">Dessert</h5>
                                </div>
                            </div>

                        </button>
                    </li>
                </ul>

                <!-- CONTENT FOOD -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <ul class="nav nav-pills mb-3 mt-3 ms-5 " id="pills-tab" role="tablist">
                            <?php $i = 1; ?>
                            <?php foreach ($menuFood as $row) : ?>
                            <li class="nav-item" role="presentation">

                                <div class="card card1 ms-3" style="width: 190px;">
                                    <img src=" ../assets/img/<?= $row["gambar"]; ?>" class="card-img-top mx-auto w-50"
                                        alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title text-dark"><?= $row['nama_menu'] ?></h6>
                                        <h7 class="card-subtitle text-muted">Rp<?= $row['harga'] ?></h7>
                                        <form method="POST" action="main.php?action=add&id_menu=<?= $row['id_menu'] ?>">
                                            <div class="mt-3">
                                                <input type="text" class="form-control form-tambah" name="quantity"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <input type="hidden" class="form-control form-tambah" name="hidden_name"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="<?= $row['nama_menu'] ?>">
                                                <input type="hidden" class="form-control form-tambah"
                                                    name="hidden_harga" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="<?= $row['harga'] ?>">
                                            </div>
                                            <div class="mt-3 mx-auto">
                                                <button type="submit" name="add_to_cart"
                                                    class="btn btn-tambah">Tambah</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </li>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- End Food Content -->

                    <!-- Drink Content -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <ul class="nav nav-pills mb-3 mt-3 ms-5 " id="pills-tab" role="tablist">
                            <?php $i = 1; ?>
                            <?php foreach ($menuDrink as $row) : ?>
                            <li class="nav-item" role="presentation">

                                <div class="card card1 ms-3" style="width: 190px;">
                                    <img src=" ../assets/img/<?= $row["gambar"]; ?>" class="card-img-top mx-auto w-50"
                                        alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title text-dark"><?= $row['nama_menu'] ?></h6>
                                        <h7 class="card-subtitle text-muted">Rp<?= $row['harga'] ?></h7>
                                        <form method="POST" action="main.php?action=add&id_menu=<?= $row['id_menu'] ?>">
                                            <div class="mt-3">
                                                <input type="text" class="form-control form-tambah" name="quantity"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <input type="hidden" class="form-control form-tambah" name="hidden_name"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="<?= $row['nama_menu'] ?>">
                                                <input type="hidden" class="form-control form-tambah"
                                                    name="hidden_harga" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="<?= $row['harga'] ?>">
                                            </div>
                                            <div class="mt-3 mx-auto">
                                                <button type="submit" name="add_to_cart"
                                                    class="btn btn-tambah">Tambah</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </li>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- End Drink Content -->

                    <!-- Dessert Content -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <ul class="nav nav-pills mb-3 mt-3 ms-5 " id="pills-tab" role="tablist">
                            <?php $i = 1; ?>
                            <?php foreach ($menuDessert as $row) : ?>
                            <li class="nav-item" role="presentation">

                                <div class="card card1 ms-3" style="width: 190px;">
                                    <img src=" ../assets/img/<?= $row["gambar"]; ?>" class="card-img-top mx-auto w-50"
                                        alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title text-dark"><?= $row['nama_menu'] ?></h6>
                                        <h7 class="card-subtitle text-muted">Rp<?= $row['harga'] ?></h7>
                                        <form method="POST" action="main.php?action=add&id_menu=<?= $row['id_menu'] ?>">
                                            <div class="mt-3">
                                                <input type="text" class="form-control form-tambah" name="quantity"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <input type="hidden" class="form-control form-tambah" name="hidden_name"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="<?= $row['nama_menu'] ?>">
                                                <input type="hidden" class="form-control form-tambah"
                                                    name="hidden_harga" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="<?= $row['harga'] ?>">
                                            </div>
                                            <div class="mt-3 mx-auto">
                                                <button type="submit" name="add_to_cart"
                                                    class="btn btn-tambah">Tambah</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </li>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- End Dessert Content -->

                </div>
            </div>
        </div>
        <!-- End Main Container -->

        <!-- Right Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 r-bar sticky-md-top">
            <ul class="nav nav-pills nav-flush flex-column mb-auto">
                <a href="#" class="nav-link r-logo" data-bs-placement="right">
                    <img src="../assets/img/logo.png" alt="" width="80%">
                </a>
                <form action="" method="POST">
                    <div class="mb-3 mt-3">
                        <select class="form-select form1" name="no_meja" aria-label="Default select example">
                            <option selected>Pilih Meja</option>
                            <?php
                        foreach ($meja as $row) {
                            echo "<option value=\"" . $row['no_meja'] . "\">" ."Meja ". $row['no_meja']  . " - " . $row['kapasitas'] . " Orang " ."</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-5">
                        <input type="text" class="form-control form1" name="nama_pemesan" id="exampleInputPassword1"
                            placeholder="Nama pemesan..">
                    </div>

                    <div class="mb-3">
                        <h3 class="ms-3 mt-3">Order Menu</h3>
                        <div class="container">

                            <?php
                                if(!empty($_SESSION["shooping_cart"]))
                                {
                                    $total = 0;
                                    foreach($_SESSION["shooping_cart"] as $keys => $values) 
                                    {
                                    ?>
                            <div class="col-md-12 ms-1">
                                <div class="d-flex justify-content-between mt-3">
                                    <h5><?php echo $values["item_nama"]; ?></h5>
                                    <a type="button" class="btn btn-sm rounded-pill"
                                        style="background: #E96F6F; color:white;"
                                        href="main.php?action=delete&id_menu=<?php echo $values["item_id"]; ?>">remove</a>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <h6 class="ms-2">
                                        <span style="color: #FFB94F;">x</span><?php echo $values["item_quantity"]; ?>
                                    </h6>
                                    <h6 class="me-1">Rp<?php echo $values["item_harga"]; ?></h6>
                                </div>
                            </div>


                            <?php
                            $total = $total + ($values["item_quantity"] * $values["item_harga"]);
                                }
                                }
                            ?>
                            <input type="hidden" class="form-control form-tambah" name="id_menu" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="<?php echo $values["item_id"]; ?>">
                            <input type="hidden" class="form-control form-tambah" name="jml_pesanan"
                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="<?php echo $values["item_quantity"]; ?>">
                            <input type="hidden" class="form-control form-tambah" name="harga" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="<?php echo $values["item_harga"]; ?>">

                        </div>

                    </div>
            </ul>
            <div class="">
                <button type="submit" name="tambahOrder" class="btn btn-order" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Order</button>
            </div>
            </form>
        </div>
        <!-- End Right Sidebar -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../assets/js/main.js"></script>
</body>

</html>