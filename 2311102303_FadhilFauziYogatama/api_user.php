<?php
header('Content-Type: application/json');

// Data baru
$user = [
    [
        "nama" => "Arif",
        "pekerjaan" => "Cyber Security",
        "lokasi" => "Jakarta"
    ],
    [
        "nama" => "Maya",
        "pekerjaan" => "Game Developer",
        "lokasi" => "Bali"
    ],
    [
        "nama" => "Reza",
        "pekerjaan" => "AI Engineer",
        "lokasi" => "Bandung"
    ]
];

echo json_encode($user);
?>