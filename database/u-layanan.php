<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_POST['id_update'];
$kategori = $_POST["kategori_update"];
$layanan = $_POST["layanan_update"];
$lat = $_POST["lat_update"];
$long = $_POST["long_update"];


$sql = "UPDATE tb_jenislayanan SET id_kategori='$kategori', jenis_layanan='$layanan', lat='$lat', lon='$long' WHERE id_layanan=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-layanan.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>