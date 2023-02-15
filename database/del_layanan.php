<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_GET['id_layanan'];


// Query untuk menambahkan data
$sql = "DELETE FROM tb_jenislayanan WHERE id_layanan=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-layanan.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>