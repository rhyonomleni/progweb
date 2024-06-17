<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: https://beta.fti.ukdw.ac.id/saimrey/login.php")

?>
