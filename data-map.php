<?php
require_once("database/config.php");

// Ambil data lat, lon, url_gambar, dan nama_lokasi dari tabel
$stmt = $conn->prepare("SELECT * FROM tb_jenislayanan");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>