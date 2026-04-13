<?php
// Tugas Modul 10 - AJAX
// Nama : Grashela Ayudia Prameswari
// NIM  : 2311102318

header('Content-Type: application/json');

$profil = [
    'nama' => 'Grashela Ayudia Prameswari',
    'pekerjaan' => 'Mahasiswa',
    'lokasi' => 'Purwokerto'
];

echo json_encode($profil);
