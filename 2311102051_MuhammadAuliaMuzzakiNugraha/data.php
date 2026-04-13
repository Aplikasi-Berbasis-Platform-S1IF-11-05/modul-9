<?php
header('Content-Type: application/json');

$profil = [
    'nama' => 'Suki',
    'pekerjaan' => 'Programmer',
    'lokasi' => 'Purwokerto',
    'email' => 'suki@qemail.web.id',
    'telepon' => '081234567890'
];

echo json_encode($profil);
