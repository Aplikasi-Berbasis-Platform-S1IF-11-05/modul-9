<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$profil = [
    ['nama' => 'Budi Santoso',    'pekerjaan' => 'Web Developer',    'lokasi' => 'Jakarta'],
    ['nama' => 'Sari Dewi',       'pekerjaan' => 'UI/UX Designer',   'lokasi' => 'Bandung'],
    ['nama' => 'Rizky Pratama',   'pekerjaan' => 'Data Scientist',   'lokasi' => 'Surabaya'],
    ['nama' => 'Anisa Rahmawati', 'pekerjaan' => 'Project Manager',  'lokasi' => 'Yogyakarta'],
    ['nama' => 'Dimas Ardianto',  'pekerjaan' => 'Backend Engineer', 'lokasi' => 'Medan'],
];

//Pilih profil acak
$index = array_rand($profil);
echo json_encode($profil[$index]);
?>