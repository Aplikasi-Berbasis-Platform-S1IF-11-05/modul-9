<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 9 <br> AJAX </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Verdi Pangestu</strong>
    <br>
    <strong>2311102100</strong>
    <br>
    <strong>S1 IF-11-REG05</strong>
  </p>
  <br />
  <h3>Dosen Pengampu :</h3>
  <p>
    <strong>Dedi Agung Prabowo, S.Kom., M.Kom</strong>
  </p>
  <br />
  <br />
  <h4>Asisten Praktikum :</h4>
  <strong>Apri Pandu Wicaksono</strong>
  <br>
  <strong>Hamka Zaenul Ardi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026 </h3>
</div>

<hr>

# Dasar Teori

## 1. AJAX (Asynchronous JavaScript and XML)

AJAX adalah sebuah teknik dalam pengembangan web yang memungkinkan pertukaran data antara client (browser) dan server di latar belakang (secara asinkron). Dengan AJAX, halaman web dapat memperbarui sebagian kecil dari antarmukanya dengan data terbaru dari server tanpa perlu memuat ulang (reload) keseluruhan halaman. Meskipun namanya mengandung unsur "XML", pada praktiknya saat ini pengembang web lebih sering menggunakan JSON sebagai format pertukaran datanya karena lebih ringan dan cepat diproses.

---

## 2. JSON (JavaScript Object Notation)

JSON adalah format standar pertukaran data yang ringan, mudah dibaca dan ditulis oleh manusia, serta mudah diterjemahkan dan dibuat oleh komputer. JSON menggunakan struktur pasangan kunci-nilai (key-value pairs) yang sangat mirip dengan Array Asosiatif pada PHP maupun Object pada JavaScript. Dalam arsitektur web modern, JSON bertindak sebagai "bahasa universal" yang menjembatani komunikasi antara backend (PHP) dan frontend (JavaScript).

---

## 3. Fetch API

Fetch API adalah antarmuka bawaan dari JavaScript modern (standar ES6) yang digunakan untuk melakukan permintaan (request) jaringan ke server secara asinkron. Fetch API merupakan pembaruan dan pengganti dari metode lama XMLHttpRequest (XHR). Fetch menggunakan konsep Promise, yang membuat penulisan kode asinkron menjadi lebih bersih, mudah dibaca, dan lebih mudah dalam menangani error (chaining dengan .then() dan .catch()).

---

## 4. Manipulasi DOM (Document Object Model)

DOM adalah antarmuka pemrograman untuk dokumen HTML. Melalui JavaScript, elemen-elemen HTML direpresentasikan sebagai objek (DOM) yang dapat dimanipulasi secara dinamis. Perintah seperti document.getElementById digunakan untuk memilih elemen tertentu, sementara atribut seperti innerHTML digunakan untuk menyisipkan atau mengubah konten di dalam elemen tersebut setelah data dari server berhasil diambil.

---

## 5. Interaksi Client-Server

- Server (PHP): Bertugas menyiapkan dan memproses data, lalu mengirimkannya dalam format JSON (sebagai API endpoint).

- Client (JavaScript/HTML): Bertugas mengirimkan request, menerima respons dari server, dan merender data tersebut ke dalam antarmuka pengguna.

---

# Tugas 10 — AJAX


## Code data.php

```php
<?php
// Memberitahu browser dan client bahwa tipe data yang dikirim adalah JSON
header('Content-Type: application/json');

// Membuat array berisi data profil
$data_profil = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data_profil);
?>
```

## Code index.html

```html
<!-- 2311102100-Verdi Pangestu -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 10 - Implementasi AJAX</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        #hasil-profil { 
            margin-top: 15px; 
            padding: 10px; 
            border: 1px solid #ddd; 
            display: inline-block;
            min-width: 300px;
        }
        button { cursor: pointer; padding: 8px 16px; }
    </style>
</head>
<body>

    <h2>Data Profil Pengguna</h2>
    
    <button id="btn-tampilkan">Tampilkan Profil</button>

    <div id="hasil-profil">
        <i>Data akan muncul di sini...</i>
    </div>

    <script>
        // Mengambil elemen dari DOM
        const tombol = document.getElementById('btn-tampilkan');
        const wadahHasil = document.getElementById('hasil-profil');

        // Menambahkan event listener klik pada tombol
        tombol.addEventListener('click', function() {
            // Mengambil data dari server menggunakan fetch
            fetch('data.php')
                .then(response => {
                    // Cek apakah request berhasil
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data');
                    }
                    return response.json(); // Mengubah response menjadi objek JSON
                })
                .then(data => {
                    // Menampilkan data ke dalam div dengan format yang diminta
                    wadahHasil.innerHTML = `
                        <strong>Nama:</strong> ${data.nama} | 
                        <strong>Pekerjaan:</strong> ${data.pekerjaan} | 
                        <strong>Lokasi:</strong> ${data.lokasi}
                    `;
                })
                .catch(error => {
                    // Menangani error jika terjadi masalah
                    console.error('Error:', error);
                    wadahHasil.innerHTML = "Gagal memuat data.";
                });
        });
    </script>

</body>
</html>
```
## Code data.php
```PHP
<?php
// Memberitahu browser bahwa konten yang dikirim adalah JSON
header('Content-Type: application/json');

// Data sederhana dalam bentuk Array
$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data);
?>
```

## Output

<img width="1919" height="967" alt="Screenshot 2026-04-10 221527" src="https://github.com/user-attachments/assets/47f02f38-d759-4919-babb-37309d47cc90" />