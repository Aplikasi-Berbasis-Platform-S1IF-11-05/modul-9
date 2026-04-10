<?php
// Memberitahu browser dan client bahwa tipe data yang dikirim adalah JSON
header('Content-Type: application/json');

// Membuat array berisi data profil
$data_profil = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data_profil);
?>