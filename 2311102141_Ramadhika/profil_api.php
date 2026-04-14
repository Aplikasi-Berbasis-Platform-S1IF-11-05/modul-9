<?php
header('Content-Type: application/json');

// Data berbeda
$profil = [
    [
        "nama" => "Rina",
        "pekerjaan" => "Frontend Developer",
        "lokasi" => "Yogyakarta"
    ],
    [
        "nama" => "Doni",
        "pekerjaan" => "Backend Developer",
        "lokasi" => "Medan"
    ],
    [
        "nama" => "Lina",
        "pekerjaan" => "Mobile Developer",
        "lokasi" => "Makassar"
    ]
];

// Convert ke JSON
echo json_encode($profil);
?>