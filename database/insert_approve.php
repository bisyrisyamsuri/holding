<?php
require_once('koneksi.php');


// Data yang akan ditambahkan
$id_user=$_POST["user"];
$layanan = $_POST["layanan"];
$kerjasama = $_POST["kerjasama"];
$n_kerjasama = $_POST["n_kerjasama"];
$tindakan = $_POST["tindakan"];

// Query untuk menambahkan data
$sql = "INSERT INTO tb_bisnis(id_user, id_jenispelayanan, jenis_kerjasama, nilai_kerjasama)
VALUES ('$id_user', '$layanan', '$kerjasama', '$n_kerjasama')";

// Menjalankan query
if (mysqli_query($conn, $sql))  {
    echo "Insert berhasil";
    $update_query = "UPDATE tb_userbisnisprofile SET tindakan='$tindakan', date=NOW() WHERE id_user = $id_user";
    if (mysqli_query($conn, $update_query)) {
        header("location:../user_approval.php?alert=berhasil");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>