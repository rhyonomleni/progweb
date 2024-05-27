<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");
if (isset($_POST["kirim"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $nama = $_POST["nama"];
    $mulai = $_POST["mulai"];
    $selesai = $_POST["selesai"];
    $durasi = $_POST["durasi"];
    $level = $_POST["level"];
    $lokasi = $_POST["lokasi"];
    $gambar = $_FILES["gambar"]["name"];
    $sql = "INSERT INTO kegiatan (username, password, nama_kegiatan, tanggal_mulai, tanggal_selesai, durasi, level, lokasi, gambar) VALUES 
    ('$username','$password','$nama','$mulai','$selesai','$durasi','$level','$lokasi','$gambar')";

    $tgl_mulai = strtotime($mulai);
    $tgl_selesai = strtotime($selesai);
    $today = strtotime(date("Y-m-d"));
    if ($tgl_mulai > $today && $tgl_selesai > $today) {
        if ($tgl_mulai <= $tgl_selesai) {
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
                }else {
                    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)) {
                        echo "Gagal upload";
                        exit;
                    }
                }
            }
            
            if(mysqli_query($conn, $sql)) {
                echo "Berhasil mengisi data.";
            }else{
                echo "Gagal mengisi data";
            }
        }else{
            echo"tanggal selesai tidak boleh sebelum tanggal mulai";
        }
    }else{
        echo"tanggal mulai dan selesai tidak boleh sebelum hari ini";
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
    <script>
        function cek() {
            
        }
    </script>
    
</head>
<body>
<div class="container">
        <a href="index.php">Kembali</a>
        <h2>Insert Page</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="mulai">Tanggal Mulai:</label>
                <input type="date" name="mulai" id="mulai" required>
            </div>
            <div class="form-group">
                <label for="selesai">Tanggal Selesai:</label>
                <input type="date" name="selesai" id="selesai" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi:</label>
                <input type="text" name="durasi" id="durasi" required>
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <select name="level" id="level" required>
                    <option value="">--- Pilih Level Kegiatan ---</option>
                    <option value="biasa">Biasa</option>
                    <option value="sedang">Sedang</option>
                    <option value="sangat penting">Sangat Penting</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" required>
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

<?php 

?>