<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$profil = [
    'nama'      => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi'    => 'Jakarta'
];
echo json_encode($profil);
?>