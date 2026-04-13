<?php
// 2311102090_Buswiryawan Raditya Boenyamin_S1IF-11-05

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 

$profil = [
    ['nama' => 'Budi',    'pekerjaan' => 'Web Developer',    'lokasi' => 'Jakarta'],
    ['nama' => 'Sari',    'pekerjaan' => 'UI/UX Designer',   'lokasi' => 'Bandung'],
    ['nama' => 'Rizky',   'pekerjaan' => 'Data Analyst',     'lokasi' => 'Surabaya'],
    ['nama' => 'Dewi',    'pekerjaan' => 'Backend Engineer',  'lokasi' => 'Yogyakarta'],
    ['nama' => 'Farhan',  'pekerjaan' => 'Mobile Developer',  'lokasi' => 'Medan'],
];

echo json_encode($profil, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);