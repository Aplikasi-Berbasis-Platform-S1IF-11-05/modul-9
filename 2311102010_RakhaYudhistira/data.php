<?php

// Mengatur header agar browser tahu bahwa outputnya adalah JSON
header('Content-Type: application/json');

// Membuat array database sederhana
$data = [
    'nama'      => 'Rakha Yudhistira',
    'pekerjaan' => 'Fullstack Developer',
    'lokasi'    => 'Purwokerto'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data);

?>
