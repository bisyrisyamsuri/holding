<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$kerjasama = $_POST["kerjasama"];


// Query untuk menambahkan data
$sql = "INSERT INTO tb_jeniskerjasama (keterangan)
VALUES ('$kerjasama')";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-kerjasama.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>