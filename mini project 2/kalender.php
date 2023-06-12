<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}


?>


<!DOCTYPE html>
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
            <th>29</th>
            <th>30</th>
            <th>31</th>
            <th class="bulanDepan">01</th>
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
</html>