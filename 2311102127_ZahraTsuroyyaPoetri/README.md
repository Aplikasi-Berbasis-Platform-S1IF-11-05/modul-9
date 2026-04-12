<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 10 <br> AJAX </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Zahra Tsuroyya Poetri</strong>
    <br>
    <strong>2311102127</strong>
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
  <strong>Apri Pandu Wicaksono </strong>
  <br>
  <strong>Hamka Zaenul Ardi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026</h3>
</div>

<hr>

### Dasar Teori

PHP (PHP: Hypertext Preprocessor) adalah bahasa pemrograman server-side scripting yang digunakan untuk membuat website dinamis. Berbeda dengan HTML yang bersifat statis, PHP dapat berinteraksi dengan database, file, dan sistem sehingga mampu menghasilkan konten yang berubah-ubah sesuai kebutuhan.

PHP bersifat cross-platform, sehingga dapat dijalankan di berbagai sistem operasi seperti Windows, Linux, dan Mac. Bahasa ini pertama kali dikembangkan oleh Rasmus Lerdorf pada tahun 1995 dan bersifat open-source.

Dalam penggunaannya, PHP memerlukan web server (seperti Apache) untuk memproses kode, serta biasanya terhubung dengan database seperti MySQL untuk penyimpanan data. Untuk mempermudah instalasi dan konfigurasi, tersedia paket seperti XAMPP, WAMP, atau MAMP yang sudah menggabungkan Apache, PHP, dan MySQL dalam satu instalasi.

## Tugas 10 - AJAX

### Source Code - data.php

```php
<?php
header('Content-Type: application/json');

$data = [
    "nama" => "Budi",
    "pekerjaan" => "Web Developer",
    "lokasi" => "Jakarta"
];

echo json_encode($data);
?>
```

### Source Code - index.html

```html
<!DOCTYPE html>
<html>
<head>
    <title>Modul 10 - AJAX</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            width: 420px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .header {
            padding: 20px 20px 10px 20px;
            text-align: center;
            font-weight: 600;
            font-size: 22px;
            color: #6f63e6;
        }

        .content {
            padding: 15px 20px 20px 20px;
        }

        button {
            width: 100%;
            background: #8b7cf6;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        button:hover {
            background: #7a6de0;
        }

        .result-box {
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .result-title {
            background: #8b7cf6;
            color: white;
            text-align: center;
            padding: 12px;
            font-weight: 500;
            font-size: 14px;
        }

        .profile-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        .profile-item:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 500;
            color: #666;
        }

        .value {
            color: #222;
        }

        .placeholder {
            text-align: center;
            color: #aaa;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header">Data Profil</div>

    <div class="content">
        <button id="btnProfil">Tampilkan Profil</button>

        <div id="hasil-profil">
            <div class="placeholder">Klik tombol untuk menampilkan data</div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#btnProfil").click(function() {

        $.ajax({
            url: "data.php",
            type: "GET",
            dataType: "json",

            success: function(data) {
                $("#hasil-profil").html(
                    "<div class='result-box'>" +

                        "<div class='result-title'>Hasil Profil</div>" +

                        "<div class='profile-item'>" +
                            "<div class='label'>Nama</div>" +
                            "<div class='value'>" + data.nama + "</div>" +
                        "</div>" +

                        "<div class='profile-item'>" +
                            "<div class='label'>Pekerjaan</div>" +
                            "<div class='value'>" + data.pekerjaan + "</div>" +
                        "</div>" +

                        "<div class='profile-item'>" +
                            "<div class='label'>Lokasi</div>" +
                            "<div class='value'>" + data.lokasi + "</div>" +
                        "</div>" +

                    "</div>"
                );
            },

            error: function(xhr, status, error) {
                $("#hasil-profil").html(
                    "<p style='color:red; text-align:center;'>Error: " + error + "</p>"
                );
            }

        });

    });

});
</script>

</body>
</html>
```

### Hasil Output

![Hasil Output](modul10(1).png)

![Hasil Output](modul10(2).png)

### Deskripsi Kode

Kode tersebut merupakan program berbasis web yang digunakan untuk menampilkan data profil dan data nilai dengan mengambil data dari server. Program ini menggunakan PHP sebagai sisi server untuk mengelola data serta JavaScript dengan jQuery (AJAX) pada sisi client untuk mengambil data tanpa perlu memuat ulang halaman.

Pada bagian server, data disimpan dalam bentuk array kemudian diolah menggunakan fungsi PHP untuk menghitung nilai akhir, menentukan grade, serta status kelulusan. Data tersebut kemudian dikonversi ke dalam format JSON agar dapat dikirim dan dibaca oleh JavaScript. Di sisi client, AJAX digunakan untuk melakukan request ke server dan menampilkan hasilnya ke halaman.

Output dari program ini berupa tampilan data yang muncul ketika tombol diklik, serta dashboard sederhana yang menampilkan informasi seperti nilai mahasiswa, rata-rata kelas, dan nilai tertinggi. 

