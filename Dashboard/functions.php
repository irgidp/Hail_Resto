<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tubes_rpl");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Function Barang
function tambahMenu($data)
{
    global $conn;

    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $deskripsi = $_POST['desc_menu'];
    $bahan = $_POST['bahan'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];


    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO menu
			  VALUES
			  ('$id_menu','$nama_menu','$harga','$kategori','$bahan','$gambar','$deskripsi')
			  ";
    // var_dump($query);
    // die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function upload
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
					alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
					alert('Yang anda upload bukan gambar');
			  </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
					alert('Ukuran gambar terlalu besar');
			  </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}

function editMenu($data)
{
    global $conn;

    // $IdBarang = htmlspecialchars($data["IdBarang"]);
    $id_menu = $data["id_menu"];
    $nama_menu = htmlspecialchars($data["nama_menu"]);
    $deskripsi = htmlspecialchars($data["desc_menu"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE menu SET
				  nama_menu = '$nama_menu',
				  harga = '$harga',
				  kategori = '$kategori',
				  bahan = '$bahan',
				  gambar = '$gambar',
                  deskripsi = '$deskripsi'
			  WHERE id_menu = '$id_menu'
			 ";
    //  var_dump($query);
    //  die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusMenu($id_menu)
{
    global $conn;
    mysqli_query($conn, "DELETE 
						 FROM menu
						 WHERE id_menu = '$id_menu'");
    return mysqli_affected_rows($conn);
}

function tambahMeja($data)
{
    global $conn;

    $no_meja = $_POST['no_meja'];
    $kapasitas = $_POST['kapasitas'];
    $stat = $_POST['stat'];

    $query = "INSERT INTO meja
			  VALUES
			  ('$no_meja','$kapasitas','$stat')
			  ";
    // var_dump($query);
    // die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editMeja($data)
{
    global $conn;

    // $IdBarang = htmlspecialchars($data["IdBarang"]);
    $no_meja = $data["no_meja"];
    $kapasitas = htmlspecialchars($data["kapasitas"]);
    $stat = htmlspecialchars($data["stat"]);


    $query = "UPDATE meja SET
				  kapasitas = '$kapasitas',
				  stat = '$stat'
			  WHERE no_meja = '$no_meja'
			 ";
    //  var_dump($query);
    //  die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusMeja($no_meja)
{
    global $conn;
    mysqli_query($conn, "DELETE 
						 FROM meja
						 WHERE no_meja = '$no_meja'");
    return mysqli_affected_rows($conn);
}

function tambahPegawai($data)
{
    global $conn;

    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];


    $query = "INSERT INTO pegawai
			  VALUES
			  ('$id_pegawai','$nama_pegawai','$jabatan','$jk','$telp')
			  ";
    // var_dump($query);
    // die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editPegawai($data)
{
    global $conn;

    // $IdBarang = htmlspecialchars($data["IdBarang"]);
    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];


    $query = "UPDATE pegawai SET
    nama_pegawai = '$nama_pegawai',
    jabatan = '$jabatan',
    jk = '$jk',
    telp = '$telp'
WHERE id_pegawai = '$id_pegawai'
";
    //  var_dump($query);
    //  die;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPegawai($id_pegawai)
{
    global $conn;
    mysqli_query($conn, "DELETE 
						 FROM pegawai
						 WHERE id_pegawai = '$id_pegawai'");
    return mysqli_affected_rows($conn);
}
