<?php
header('Content-Type: application/json');

// Data sederhana
$data = [
    "nama" => "Budi",
    "pekerjaan" => "Web Developer",
    "lokasi" => "Jakarta"
];

// Ubah ke JSON dan tampilkan
echo json_encode($data);
?>