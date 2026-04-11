<?php
/**
 * Endpoint API untuk mengambil data profil karyawan.
 * 
 * Skrip ini menyediakan antarmuka JSON sederhana untuk profil karyawan simulasi.
 * Digunakan untuk latihan implementasi AJAX dalam praktikum.
 * 
 * @package AJAX_Practical
 * @author Rozhak <2311102293>
 * @version 1.0.0
 * 
 * @return void Mengeluarkan objek JSON yang berisi 'nama', 'pekerjaan', dan 'lokasi'.
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

echo json_encode($data);