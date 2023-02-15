<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$kategori = $_POST["kategori"];
$layanan = $_POST["layanan"];
$lat = $_POST["lat"];
$long = $_POST["long"];

// Query untuk menambahkan data
$sql = "INSERT INTO tb_jenislayanan (id_kategori, jenis_layanan, lat, lon)
VALUES ('$kategori', '$layanan', '$lat', '$long')";

// Menjalankan query
if (mysqli_query($conn, $sql))  {
    header("location:../data-layanan.php?alert=berhasil");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>