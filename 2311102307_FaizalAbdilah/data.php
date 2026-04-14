<?php
header('Content-Type: application/json');

// Data sederhana (seperti database)
$data = [
    [
        "nama" => "Budi",
        "pekerjaan" => "Web Developer",
        "lokasi" => "Jakarta"
    ],
    [
        "nama" => "Siti",
        "pekerjaan" => "UI Designer",
        "lokasi" => "Bandung"
    ],
    [
        "nama" => "Andi",
        "pekerjaan" => "Data Analyst",
        "lokasi" => "Surabaya"
    ]
];

// Ubah ke JSON
echo json_encode($data);
?>