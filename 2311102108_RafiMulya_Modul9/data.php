<?php
// ============================================================
// data.php — Server sederhana: mengembalikan data profil JSON
// Modul 9: AJAX — Aplikasi Berbasis Platform
// ============================================================

// Set header agar browser tahu response ini berformat JSON
header('Content-Type: application/json');

// Izinkan akses dari semua origin (agar fetch dari index.html lokal bisa berjalan)
header('Access-Control-Allow-Origin: *');

// Data profil sebagai array asosiatif PHP
$profiles = [
    [
        'id'         => 1,
        'nama'       => 'Budi Santoso',
        'pekerjaan'  => 'Web Developer',
        'lokasi'     => 'Jakarta',
        'email'      => 'budi@example.com',
        'avatar'     => 'BS',
        'warna'      => '#4f8ef7'
    ],
    [
        'id'         => 2,
        'nama'       => 'Siti Rahayu',
        'pekerjaan'  => 'UI/UX Designer',
        'lokasi'     => 'Bandung',
        'email'      => 'siti@example.com',
        'avatar'     => 'SR',
        'warna'      => '#f05a9e'
    ],
    [
        'id'         => 3,
        'nama'       => 'Ahmad Fauzi',
        'pekerjaan'  => 'Data Scientist',
        'lokasi'     => 'Surabaya',
        'email'      => 'ahmad@example.com',
        'avatar'     => 'AF',
        'warna'      => '#34d17a'
    ],
    [
        'id'         => 4,
        'nama'       => 'Dewi Lestari',
        'pekerjaan'  => 'Product Manager',
        'lokasi'     => 'Yogyakarta',
        'email'      => 'dewi@example.com',
        'avatar'     => 'DL',
        'warna'      => '#f59e42'
    ],
    [
        'id'         => 5,
        'nama'       => 'Rizky Pratama',
        'pekerjaan'  => 'DevOps Engineer',
        'lokasi'     => 'Medan',
        'email'      => 'rizky@example.com',
        'avatar'     => 'RP',
        'warna'      => '#a78bfa'
    ]
];

// Bungkus dalam struktur response standar
$response = [
    'success'   => true,
    'message'   => 'Data berhasil diambil',
    'total'     => count($profiles),
    'data'      => $profiles,
    'timestamp' => date('Y-m-d H:i:s')
];

// Encode array PHP menjadi JSON dan tampilkan
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>