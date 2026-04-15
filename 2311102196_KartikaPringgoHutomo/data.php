<?php
/**
 * Tugas Modul 10 - AJAX (Server Side)
 * Nama: Kartika Pringgo Hutomo
 * NIM: 2311102196
 */

// Header agar browser mengenali response sebagai JSON
header('Content-Type: application/json');

// Data array sederhana sesuai instruksi
$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Mengubah array menjadi format JSON dan menampilkannya
echo json_encode($data);
?>
