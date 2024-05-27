<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$id = $_GET["id"];
$kgtn = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id = $id");
$rows = [];
while ($row = mysqli_fetch_assoc($kgtn)) {
    $rows[] = $row;
}
$isi = $rows[0];
if(isset($_POST["update"])){
    $nama = $_POST["nama"];
        $mulai = $_POST["mulai"];
        $selesai = $_POST["selesai"];
        $durasi = $_POST["durasi"];
        $level = $_POST["level"];
        $lokasi = $_POST["lokasi"];
        $gambar = $_FILES["gambar"]["name"];
    $tgl_mulai = strtotime($mulai);
    $tgl_selesai = strtotime($selesai);
    $today = strtotime(date("Y-m-d"));
    if ($selesai < date("Y-m-d")) {
        echo "
            <script>
                alert('kegiatan sudah lewat, update data gagal');
                document.location.href = 'deskripsi.php';
            </script>    
        ";
    }elseif ($tgl_mulai < $today || $tgl_selesai < $today) { 
        echo "tanggal mulai dan tanggal selesai tidak boleh sebelum hari ini!";
    }elseif ($tgl_selesai < $tgl_mulai) { 
        echo "tanggal selesai tidak boleh sebelum tanggal mulai!";
    }else{
        if (isset($_FILES["gambar"]["name"])) {
            $uploadfile = "foto/".$_FILES["gambar"]["name"];
            $tipefile = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (file_exists($uploadfile) && $uploadfile != "foto/") {
                echo "file ini sudah ada";
                exit;
            }elseif ($tipefile != "jpg" && $tipefile != "png" && $tipefile != "jpeg" && $uploadfile != "foto/") {
                echo "Hanya bisa JPG, PNG, dan JPEG";
                exit;
            }elseif ($uploadfile == "foto/") {
                //hanya untuk menghandle ketika gambar tidak diisi
            }elseif (!move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)){
                echo "Gagal upload";
                exit;
            }
             
            $query = "UPDATE kegiatan SET
                id = $id,
                nama_kegiatan = '$nama',
                tanggal_mulai = '$mulai',
                tanggal_selesai = '$selesai',
                durasi = '$durasi',
                level = '$level',
                lokasi = '$lokasi',
                gambar = '$gambar'
                WHERE id = $id";

            mysqli_query($conn, $query);
            if (mysqli_affected_rows($conn) > 0) {
                echo "Data berhasil diubah";
            }else{
                echo "Tidak ada data diubah";
            }
            
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="insert.css" >
    
</head>
<body>
<div class="container">
        <a href="index.php">Kembali</a>
        <h2>Update Page</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" name="nama" id="nama" value="<?= $isi["nama_kegiatan"]?>" required>
            </div>
            <div class="form-group">
                <label for="mulai">Tanggal Mulai:</label>
                <input type="date" name="mulai" id="mulai" value="<?= $isi["tanggal_mulai"]?>"required>
            </div>
            <div class="form-group">
                <label for="selesai">Tanggal Selesai:</label>
                <input type="date" name="selesai" id="selesai" value="<?= $isi["tanggal_selesai"]?>" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi:</label>
                <input type="text" name="durasi" id="durasi" value="<?= $isi["durasi"]?>" required>
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <select name="level" id="level" required>
                    <option value="">--- Pilih Level Kegiatan ---</option>
                    <option value="biasa" <?= $isi["level"]=='Biasa'?'selected':'' ?>>Biasa</option>
                    <option value="sedang" <?= $isi["level"]=='Sedang'?'selected':'' ?>>Sedang</option>
                    <option value="sangat penting" <?= $isi["level"]=='Sangat Penting'?'selected':'' ?>>Sangat Penting</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" value="<?= $isi["lokasi"]?>" required>
            </div>
            <div class="upload-container">
                <label for="gambar">Gambar:</label>
                <label for="gambar" class="file-upload">Choose File</label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="form-group">
                <input type="submit" name="kirim" value="Submit">
            </div>
        </form>
    </div>


</body>
</html>