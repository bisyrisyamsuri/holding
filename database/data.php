<?php

include 'koneksi.php';


$query = "SELECT 
MONTH(date) as bulan, 
SUM(nilai_kerjasama) as total_pendapatan 
FROM tb_bisnis GROUP BY bulan ORDER BY bulan ASC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $angka[] = $row['total_pendapatan'];
}

$response = [
    'bulan' => $bulan,
    'angka' => $angka 
];

echo json_encode($response);
mysqli_close($conn);

?>