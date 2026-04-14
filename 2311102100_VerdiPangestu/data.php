<?php
// Memberitahu browser bahwa konten yang dikirim adalah JSON
header('Content-Type: application/json');

// Data sederhana dalam bentuk Array
$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data);
?>