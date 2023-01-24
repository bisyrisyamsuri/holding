<?php

include 'koneksi.php';

$query = "SELECT bulan, angka2 FROM db_tesdata";
$result = mysqli_query($conn, $query);

$bulan = [];
$angka = [];

while($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $angka[] = $row['angka2'];
}

$response = [
    'bulan' => $bulan,
    'angka2' => $angka
];

echo json_encode($response);
mysqli_close($conn);

?>