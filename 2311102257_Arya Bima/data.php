<?php
header('Content-Type: application/json');

// Data contoh
$data = [
    'nama' => 'Budi Santoso',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta',
    'email' => 'budi@example.com',
    'hobi' => 'Coding & Design'
];

// Mengubah array menjadi format JSON
echo json_encode($data);
?>