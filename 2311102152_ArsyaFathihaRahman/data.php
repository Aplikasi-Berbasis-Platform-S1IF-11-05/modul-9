<?php
header('Content-Type: application/json');

$data = [
    [
        "nama" => "Arsya Fathiha Rahman",
        "pekerjaan" => "Frontend Developer",
        "lokasi" => "Purwokerto"
    ],
    [
        "nama" => "Charles Leker",
        "pekerjaan" => "UI/UX Designer",
        "lokasi" => "Bandung"
    ],
    [
        "nama" => "Gabriel Guevara",
        "pekerjaan" => "Backend Developer",
        "lokasi" => "Jakarta"
    ]
];

echo json_encode($data);
?>