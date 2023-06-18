<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

// Tes, comment jika kode ndak berhasil dari sini
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$sql = "SELECT * FROM kegiatan WHERE username = '$_SESSION[username]' AND password = '$_SESSION[pass]'";
$result = mysqli_query($conn, $sql);
$events = [];
$eventDate = [];
$eventName = [];

$calendarHTML = '<header id="atas">Kalender Kegiatan</header>
                <a href="logout.php">Logout</a>
                <h1>Februari 2023</h1>
                <table border="1" cellspacing="0" cellpadding="50">';

$calendarHTML .= '<thead>
                    <tr>
                        <th class="day">Minggu</th>
                        <th class="day">Senin</th>
                        <th class="day">Selasa</th>
                        <th class="day">Rabu</th>
                        <th class="day">Kamis</th>
                        <th class="day">Jumat</th>
                        <th class="day">Sabtu</th>
                    </tr>
                    </thead>';

$calendarHTML .= '<thead>
                <th class="bulanLalu">29</th>
                <th class="bulanLalu">30</th>
                <th class="bulanLalu">31</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                </thead>
                <tbody>';

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tmpDate = [$row['tanggal_mulai']];
        $tmpName = [$row['nama_kegiatan']];
        
        $eventDate[] = $tmpDate;
        $eventName[] = $tmpName;

        $event = [
            'nama' => $row['nama_kegiatan'],
            'mulai' => $row['tanggal_mulai'],
            'selesai' => $row['tanggal_selesai'],
            'durasi' => $row['durasi'],
            'level' => $row['level'],
            'lokasi' => $row['lokasi']
        ];

        $events[] = $event;

    }
}


else{
    echo "Tabel Kosong";
}

for($i=29; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-01-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=01; $i <= 4; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                    </thead>
                    <tbody>';

for($i=5; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 11; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                    </thead>
                    <tbody>';

for($i=12; $i <= 18; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                    </thead>
                    <tbody>';

for($i=19; $i <= 25; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th class="bulanDepan">1</th>
                        <th class="bulanDepan">2</th>
                        <th class="bulanDepan">3</th>
                        <th class="bulanDepan">4</th>
                    </thead>
                    <tbody>';
                    

for($i=26; $i <= 28; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 4; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    </table>
                    <br><br>
                    <h1>Maret 2023</h1>
                    <table border="1" cellspacing="0" cellpadding="50">
                        <thead>
                            <th class="day">Minggu</th>
                            <th class="day">Senin</th>
                            <th class="day">Selasa</th>
                            <th class="day">Rabu</th>
                            <th class="day">Kamis</th>
                            <th class="day">Jumat</th>
                            <th class="day">Sabtu</th>
                        </thead>';

$calendarHTML .= '<thead>
                    <th class="bulanLalu">26</th>
                    <th class="bulanLalu">27</th>
                    <th class="bulanLalu">28</th>
                    <th class="bulanSekarang">1</th>
                    <th class="bulanSekarang">2</th>
                    <th><div class="bulanSekarang">3</div></th>
                    <th class="bulanSekarang">4</th>
                    </thead>
                    <tbody>';

for($i=26; $i <= 28; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 4; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= ' </tbody>
                    <thead>
                        <th class="bulanSekarang">5</th>
                        <th class="bulanSekarang">6</th>
                        <th>
                            <div>7</div>
                        </th>
                        <th class="bulanSekarang">8</th>
                        <th class="bulanSekarang">9</th>
                        <th class="bulanSekarang">10</th>
                        <th class="bulanSekarang">11</th>
                    </thead>
                    <tbody>';

for($i=5; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 11; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">12</th>
                        <th class="bulanSekarang">13</th>
                        <th class="bulanSekarang">14</th>
                        <th class="bulanSekarang">15</th>
                        <th>
                            <div class="bulanSekarang">16</div>
                        </th>
                        <th class="bulanSekarang">17</th>
                        <th class="bulanSekarang">18</th>
                    </thead>
                    <tbody>';

for($i=12; $i <= 18; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th>
                            <div class="bulanSekarang">19</div>
                        </th>
                        <th class="bulanSekarang">20</th>
                        <th class="bulanSekarang">21</th>
                        <th class="bulanSekarang">22</th>
                        <th class="bulanSekarang">23</th>
                        <th class="bulanSekarang">24</th>
                        <th class="bulanSekarang">25</th>
                    </thead>
                    <tbody>';

for($i=19; $i <= 25; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">26</th>
                        <th>
                            <div class="bulanSekarang">27</div>
                        </th>
                        <th class="bulanSekarang">28</th>
                        <th class="bulanSekarang">29</th>
                        <th class="bulanSekarang">30</th>
                        <th class="bulanSekarang">31</th>
                        <th class="bulanDepan">1</th>
                    </thead>
                    <tbody>';

for($i=26; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 1; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    </table>
                    <br><br>
                    <h1>April 2023</h1>
                    <table border="1" cellspacing="0" cellpadding="50">
                        <thead>
                            <th class="day">Minggu</th>
                            <th class="day">Senin</th>
                            <th class="day">Selasa</th>
                            <th class="day">Rabu</th>
                            <th class="day">Kamis</th>
                            <th class="day">Jumat</th>
                            <th class="day">Sabtu</th>
                        </thead>';

$calendarHTML .= '<thead>
                    <th class="bulanLalu">26</th>
                    <th>
                        <div class="bulanLalu">27</div>
                    </th>
                    <th class="bulanLalu">28</th>
                    <th class="bulanLalu">29</th>
                    <th class="bulanLalu">30</th>
                    <th class="bulanLalu">31</th>
                    <th class="bulanSekarang">1</th>
                    </thead>
                    <tbody>';

for($i=26; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-03-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 1; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">2</th>
                        <th class="bulanSekarang">3</th>
                        <th class="bulanSekarang">4</th>
                        <th>
                            <div class="bulanSekarang">5</div>
                        </th>
                        <th class="bulanSekarang">6</th>
                        <th>
                            <div class="bulanSekarang">7</div>
                        </th>
                        <th class="bulanSekarang">8</th>
                    </thead>
                    <tbody>';

for($i=2; $i <= 8; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">9</th>
                        <th class="bulanSekarang">10</th>
                        <th class="bulanSekarang">11</th>
                        <th class="bulanSekarang">12</th>
                        <th class="bulanSekarang">13</th>
                        <th>
                            <div class="bulanSekarang">14</div>
                        </th>
                        <th class="bulanSekarang">15</th>
                    </thead>
                    <tbody>';

for($i=9; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 15; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= ' </tbody>
                    <thead>
                        <th class="bulanSekarang">16</th>
                        <th class="bulanSekarang">17</th>
                        <th class="bulanSekarang">18</th>
                        <th class="bulanSekarang">19</th>
                        <th class="bulanSekarang">20</th>
                        <th class="bulanSekarang">21</th>
                        <th class="bulanSekarang">22</th>
                    </thead>
                    <tbody>';

for($i=16; $i <= 22; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">23</th>
                        <th class="bulanSekarang">24</th>
                        <th class="bulanSekarang">25</th>
                        <th class="bulanSekarang">26</th>
                        <th class="bulanSekarang">27</th>
                        <th class="bulanSekarang">28</th>
                        <th class="bulanSekarang">29</th>
                    </thead>
                    <tbody>';

for($i=23; $i <= 29; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">30</th>
                        <th class="bulanDepan">1</th>
                        <th class="bulanDepan">2</th>
                        <th class="bulanDepan">3</th>
                        <th class="bulanDepan">4</th>
                        <th class="bulanDepan">5</th>
                        <th class="bulanDepan">6</th>
                    </thead>
                    <tbody>';

for($i=30; $i <= 30; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-04-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 6; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-05-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    </table>
                    <footer id="bawah">Mini Project</footer>';

echo $calendarHTML;

// Tes, comment jika kode ndak berhasil sampai sini

?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="atas">Kalender Kegiatan</header>
    <a href="logout.php">Logout</a>
    <h1>Februari 2023</h1>
    <table border="1" cellspacing="0" cellpadding="50">
        <thead>
            <tr>
                <th class="day">Minggu</th>
                <th class="day">Senin</th>
                <th class="day">Selasa</th>
                <th class="day">Rabu</th>
                <th class="day">Kamis</th>
                <th class="day">Jumat</th>
                <th class="day">Sabtu</th>
            </tr>
        </thead>
        <thead>
            <th class="bulanLalu">29</th>
            <th class="bulanLalu">30</th>
            <th class="bulanLalu">31</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </thead>
        <tbody>
            <tr></tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></a></td>
                <td><a href=""></a></td>
        </tbody>
        <thead>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></a></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
        <thead>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="event5.html">Nobar Bayern Munchen vs PSG</a></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
        <thead>
            <th>19</th>
            <th>20</th>
            <th>21</th>
            <th>22</th>
            <th>23</th>
            <th>24</th>
            <th>25</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="event6.html">Bermain basket</a></td>
        </tbody>
        <thead>
            <th>26</th>
            <th>27</th>
            <th>28</th>
            <th class="bulanDepan">01</th>
            <th class="bulanDepan">02</th>
            <th class="bulanDepan">03</th>
            <th class="bulanDepan">04</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
    </table>
    <br><br>
    <h1>Maret 2023</h1>
    <table border="1" cellspacing="0" cellpadding="50">
        <thead>
            <th class="day">Minggu</th>
            <th class="day">Senin</th>
            <th class="day">Selasa</th>
            <th class="day">Rabu</th>
            <th class="day">Kamis</th>
            <th class="day">Jumat</th>
            <th class="day">Sabtu</th>
        </thead>
        
        <thead>
            <th class="bulanLalu">26</th>
            <th class="bulanLalu">27</th>
            <th class="bulanLalu">28</th>
            <th class="bulanSekarang">1</th>
            <th class="bulanSekarang">2</th>
            <th><div class="bulanSekarang">3</div></th>
            <th class="bulanSekarang">4</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="event" id="futsal"><a href="event1.html">Futsal</a></div></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">5</th>
            <th class="bulanSekarang">6</th>
            <th>
                <div>7</div>
            </th>
            <th class="bulanSekarang">8</th>
            <th class="bulanSekarang">9</th>
            <th class="bulanSekarang">10</th>
            <th class="bulanSekarang">11</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td><div class="event" id="tugas"><a href="event2.html">Mengerjakan tugas Progweb</a></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">12</th>
            <th class="bulanSekarang">13</th>
            <th class="bulanSekarang">14</th>
            <th class="bulanSekarang">15</th>
            <th>
                <div class="bulanSekarang">16</div>
            </th>
            <th class="bulanSekarang">17</th>
            <th class="bulanSekarang">18</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="event" id="mendaki"><a href="event3.html">Mendaki Gunung</a></div>    </td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th>
                <div class="bulanSekarang">19</div>
            </th>
            <th class="bulanSekarang">20</th>
            <th class="bulanSekarang">21</th>
            <th class="bulanSekarang">22</th>
            <th class="bulanSekarang">23</th>
            <th class="bulanSekarang">24</th>
            <th class="bulanSekarang">25</th>
        </thead>
        <tbody>
            <td><div class="event" id="lari"><a href="event4.html">Lari Pagi</a></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">26</th>
            <th>
                <div class="bulanSekarang">27</div>
            </th>
            <th class="bulanSekarang">28</th>
            <th class="bulanSekarang">29</th>
            <th class="bulanSekarang">30</th>
            <th class="bulanSekarang">31</th>
            <th class="bulanDepan">01</th>
        </thead>
        <tbody>
            <td></td>
            <td><div class="UTS"><a href="UTS.html">Minggu UTS</a></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
    </table>
    <br><br>
    <h1>April 2023</h1>
    <table border="1" cellspacing="0" cellpadding="50">
        <thead>
            <th class="day">Minggu</th>
            <th class="day">Senin</th>
            <th class="day">Selasa</th>
            <th class="day">Rabu</th>
            <th class="day">Kamis</th>
            <th class="day">Jumat</th>
            <th class="day">Sabtu</th>
        </thead>

        <thead>
            <th class="bulanLalu">26</th>
            <th>
                <div class="bulanLalu">27</div>
            </th>
            <th class="bulanLalu">28</th>
            <th class="bulanLalu">29</th>
            <th class="bulanLalu">30</th>
            <th class="bulanLalu">31</th>
            <th class="bulanSekarang">01</th>
        </thead>
        <tbody>
            <td></td>
            <td><div class="UTS"><a href="UTS.html">Minggu UTS</a></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">02</th>
            <th class="bulanSekarang">03</th>
            <th class="bulanSekarang">04</th>
            <th>
                <div class="bulanSekarang">05</div>
            </th>
            <th class="bulanSekarang">06</th>
            <th>
                <div class="bulanSekarang">07</div>
            </th>
            <th class="bulanSekarang">08</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="libur"><a href="paskah.html">Libur paskah</a></div></td>
            <td></td>
            <td><div class="libur"><a href="paskah.html">Selesai libur</a></div></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">09</th>
            <th class="bulanSekarang">10</th>
            <th class="bulanSekarang">11</th>
            <th class="bulanSekarang">12</th>
            <th class="bulanSekarang">13</th>
            <th>
                <div class="bulanSekarang">14</div>
            </th>
            <th class="bulanSekarang">15</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="UTS"><a href="UTS.html">Selesai UTS</a></div></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">16</th>
            <th class="bulanSekarang">17</th>
            <th class="bulanSekarang">18</th>
            <th class="bulanSekarang">19</th>
            <th class="bulanSekarang">20</th>
            <th class="bulanSekarang">21</th>
            <th class="bulanSekarang">22</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">23</th>
            <th class="bulanSekarang">24</th>
            <th class="bulanSekarang">25</th>
            <th class="bulanSekarang">26</th>
            <th class="bulanSekarang">27</th>
            <th class="bulanSekarang">28</th>
            <th class="bulanSekarang">29</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

        <thead>
            <th class="bulanSekarang">30</th>
            <th class="bulanDepan">1</th>
            <th class="bulanDepan">2</th>
            <th class="bulanDepan">3</th>
            <th class="bulanDepan">4</th>
            <th class="bulanDepan">5</th>
            <th class="bulanDepan">6</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
    </table>
    <footer id="bawah">Mini Project</footer>
</body>
</html> -->