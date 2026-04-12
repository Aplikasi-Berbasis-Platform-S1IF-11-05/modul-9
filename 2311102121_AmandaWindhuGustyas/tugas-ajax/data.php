<?php
header('Content-Type: application/json');

// Data sederhana (database tiruan)
$data = [
    [
        'nama' => 'Amanda',
        'pekerjaan' => 'Web Developer',
        'lokasi' => 'Cilacap'
    ],
    [
        'nama' => 'Siti',
        'pekerjaan' => 'UI/UX Designer',
        'lokasi' => 'Bandung'
    ],
    [
        'nama' => 'Andi',
        'pekerjaan' => 'Data Analyst',
        'lokasi' => 'Surabaya'
    ]
];

// Ubah ke JSON
echo json_encode($data);
?>