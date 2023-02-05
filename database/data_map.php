<?php

include 'koneksi.php';

$query = "SELECT * FROM tb_jenislayanan";
$result = mysqli_query($conn, $query);

$id = [];
$kategori = [];
$lat = [];
$lon = [];

while($row = mysqli_fetch_assoc($result)) {
    $id[] = $row['id_layanan'];
    $kategori[] = $row['id_kategori'];
    $lat[] = $row['lat'];
    $lon[] = $row['lon'];
}

$response = [
    'id_layanan' => $id,
    'id_kategori' => $kategori,
    'lat' => $lat,
    'lon' => $lon,
];

echo json_encode($response);
mysqli_close($conn);

?>