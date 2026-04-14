<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$profile = [
    'nama'      => 'Dr. Rendra Wijaya, M.Kom.',
    'pekerjaan' => 'Senior Fullstack Developer & AI Engineer',
    'lokasi'    => 'Jakarta, Indonesia'
];

echo json_encode($profile);
?>