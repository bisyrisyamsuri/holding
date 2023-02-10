<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$kategori = $_POST["kategori"];
$target = $_POST["target"];


// Query untuk menambahkan data
$sql = "INSERT INTO tb_kategoribisnis (kategori_bisnis, target_capaian)
VALUES ('$kategori', '$target')";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../tambah_kategori.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>