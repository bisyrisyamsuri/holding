<?php
require_once('koneksi.php');

// Data yang akan ditambahkan
$id = $_POST['id_update'];
$keterangan = $_POST["kerjasama_update"];


$sql = "UPDATE tb_jeniskerjasama SET keterangan='$keterangan' WHERE id_kerjasama=$id";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    header("location:../data-kerjasama.php?alert=berhasil");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>