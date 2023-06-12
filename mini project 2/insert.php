<?php 
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

if (isset($_POST["upload"])) {
    $nama = $_POST["nama"];
    $mulai = $_POST["mulai"];
    $selesai = $_POST["selesai"];
    $durasi = $_POST["durasi"];
    $level = $_POST["level"];
    $lokasi = $_POST["lokasi"];
    $gambar = $_FILES["gambar"]["name"];
    $sql = "INSERT INTO kegiatan (nama_kegiatan, tanggal_mulai, tanggal_selesai, durasi, level, lokasi, gambar) VALUES 
    ('$nama','$mulai','$selesai','$durasi','$level','$lokasi','$gambar')";
    if(mysqli_query($conn, $sql)) {
        echo "Berhasil mengisi data.";
    }else{
        echo "Gagal mengisi data";
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
    
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nama">nama kegiatan : </label>
    <input type="text" name="nama" max="50" id="nama"> <br>
    <label for="mulai">Tanggal Mulai : </label> 
    <input type="date" name="mulai" id="mulai"><br>
    <label for="mulai">Tanggal Selesai : </label>
    <input type="date" name="selesai" id="selesai"><br>
    <label for="durasi">Durasi : </label>
    <input type="text" name="durasi" id="durasi"><br>
    Level : <input type="radio" value="Biasa" name="level" id="biasa">
    <label for="biasa">Biasa</label>
    <input type="radio" value="Sedang" name="level" id="sedang">
    <label for="sedang">Sedang</label>
    <input type="radio" value="Sangat Penting" name="level" id="penting">
    <label for="penting">Sangat Penting</label><br>
    <label for="lokasi">Lokasi : </label>
    <input type="text" name="lokasi" id="lokasi"><br>
    <label for="gambar">gambar : </label>
    <input type="file" name="gambar"><br>
    <input type="submit" name="upload" value="submit">
    </form>
</body>
</html>

<?php 
if (isset($_FILES["gambar"]["name"])) {
    $uploadfile = "foto/".$_FILES["gambar"]["name"];
    $tipefile = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
    if (file_exists($uploadfile)) {
        echo "file ini sudah ada";
    }elseif ($tipefile != "jpg" && $tipefile != "png" && $tipefile != "jpeg") {
        echo "Hanya bisa JPG, PNG, dan JPEG";
    }else {
        if (!move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)) {
            echo "Gagal upload";
        }
    }
    
}

?>