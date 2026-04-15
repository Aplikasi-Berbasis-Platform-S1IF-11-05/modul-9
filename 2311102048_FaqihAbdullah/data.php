<?php
// Set header untuk response JSON
header('Content-Type: application/json');

// Data sederhana sebagai database
$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Ubah data ke format JSON dan tampilkan
echo json_encode($data);
?>