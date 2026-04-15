<?php
header('Content-Type: application/json');

$data = [
    ['nama' => 'Alexa', 'pekerjaan' => 'Web Developer', 'lokasi' => 'Jakarta'],
    ['nama' => 'Siti', 'pekerjaan' => 'UI/UX Designer', 'lokasi' => 'Bandung'],
    ['nama' => 'Andi', 'pekerjaan' => 'Data Analyst', 'lokasi' => 'Surabaya']
];

echo json_encode($data);