<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tugas_blogspot";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("ah cing baleg atuh nga konekeun teh!:" .mysqli_connect_error());
}

?>