<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_GET['id_kerjasama'];


// Query untuk menambahkan data
$sql = "DELETE FROM tb_jeniskerjasama WHERE id_kerjasama=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-kerjasama.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>