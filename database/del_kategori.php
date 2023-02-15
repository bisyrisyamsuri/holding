<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_GET['id_kategori'];


// Query untuk menambahkan data
$sql = "DELETE FROM tb_kategoribisnis WHERE id_kategori=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-kategori.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>