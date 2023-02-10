<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "holding_database";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>