<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 9 <br> PHP </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Adrian Basari Rhesa</strong>
    <br>
    <strong>2311102105</strong>
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
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 10 - AJAX</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #hasil-profil {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 5px;
            display: none;
            /* Disembunyikan dulu sebelum tombol diklik */
        }
    </style>
</head>

<body>

    <h2>Profil Pengguna (AJAX Fetch API)</h2>

    <button class="btn" id="btn-tampil">Tampilkan Profil</button>

    <div id="hasil-profil"></div>

    <script>
        // 1. Menangkap elemen tombol dan div hasil
        const tombolTampil = document.getElementById('btn-tampil');
        const divHasil = document.getElementById('hasil-profil');

        // 2. Menambahkan event listener 'click' pada tombol
        tombolTampil.addEventListener('click', function () {

            // 3. Menggunakan Fetch API untuk melakukan request AJAX ke data.php
            fetch('data.php')
                .then(response => {
                    // Mengecek apakah request berhasil (status 200 OK)
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan jaringan/server');
                    }
                    // Mengubah response text menjadi object JSON JavaScript
                    return response.json();
                })
                .then(data => {
                    // 4. Menampilkan data ke dalam div sesuai format yang diminta
                    divHasil.style.display = 'block'; // Memunculkan kotak div
                    divHasil.innerHTML = `Nama: <strong>${data.nama}</strong> | Pekerjaan: <strong>${data.pekerjaan}</strong> | Lokasi: <strong>${data.lokasi}</strong>`;
                })
                .catch(error => {
                    // Menangani jika terjadi error
                    console.error('Gagal mengambil data:', error);
                    divHasil.style.display = 'block';
                    divHasil.innerHTML = '<span style="color:red;">Gagal memuat profil. Pastikan server berjalan.</span>';
                });

        });
    </script>

</body>

</html>
```


## Output

<img width="1919" height="967" alt="Screenshot 2026-04-10 221527" src="https://github.com/user-attachments/assets/47f02f38-d759-4919-babb-37309d47cc90" />
