<?php
// Tugas Modul 10 - AJAX
// Nama : Muhamad Rafli Al Farizqi
// NIM  : 2311102315

header('Content-Type: application/json');

$profil = [
    'nama' => 'Muhamad Rafli Al Farizqi',
    'pekerjaan' => 'Mahasiswa',
    'lokasi' => 'Purwokerto'
];

echo json_encode($profil);
