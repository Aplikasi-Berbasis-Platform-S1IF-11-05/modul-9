<?php
header('Content-Type: application/json');

// Data profil yang lebih lengkap (simulasi database)
$data = [
    'nama' => 'Budi Santoso',
    'pekerjaan' => 'Web Developer Senior',
    'lokasi' => 'Jakarta, Indonesia',
    'email' => 'budi.santoso@example.com',
    'bio' => 'Suka membangun aplikasi web interaktif dengan JavaScript & PHP. Memiliki pengalaman lebih dari 6 tahun di bidang front-end dan back-end. Open untuk kolaborasi!'
];

// Bisa juga menambahkan data lain seperti website, no telepon dll jika ingin
// $data['telepon'] = '+62 812 3456 7890';

// Mengembalikan data dalam format JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>