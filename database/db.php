<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "holding_database";
$koneksi = mysqli_connect($host, $user, $pass, $database);

if (!$koneksi) {
    echo "Not Connect";
    die("Koneksi gagal: ".mysqli_connect_error());
}

?> 
