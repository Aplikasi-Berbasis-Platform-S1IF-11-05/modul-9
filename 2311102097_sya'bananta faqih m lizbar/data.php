<?php
header('Content-Type: application/json');

// Data sederhana (array asosiatif)
$data = [
    "nama" => "Rico",
    "pekerjaan" => "Web Developer",
    "lokasi" => "Jakarta"
];

// Ubah ke JSON dan tampilkan
echo json_encode($data);
?>