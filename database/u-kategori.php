<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_POST['id_update'];
$kategori = $_POST["kategori_update"];
$target = $_POST["target_update"];


$sql = "UPDATE tb_kategoribisnis SET kategori_bisnis='$kategori', target_capaian='$target' WHERE id_kategori=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-kategori.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>