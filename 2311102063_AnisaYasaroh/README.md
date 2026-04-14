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
    <strong>Anisa Yasaroh</strong>
    <br>
    <strong>2311102063</strong>
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
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026 </h3>
</div>

<hr>

## Dasar Teori

Bootstrap merupakan framework open-source berbasis HTML, CSS, dan JavaScript yang digunakan untuk mempermudah proses pembuatan tampilan website yang responsif dan mobile-friendly. Framework ini pertama kali dikembangkan oleh tim Twitter pada tahun 2011 dengan tujuan menyatukan standar desain antarmuka agar lebih konsisten dan mudah diterapkan. Bootstrap menyediakan berbagai komponen siap pakai seperti tombol, formulir, navigasi, serta sistem grid layout yang memungkinkan pengembang membuat tampilan web yang rapi dan mampu menyesuaikan ukuran layar secara otomatis pada berbagai perangkat.

Penggunaan Bootstrap membantu mempercepat proses pengembangan website karena developer tidak perlu membangun desain dari nol. Framework ini juga menyediakan komponen interaktif berbasis JavaScript seperti modal, dropdown, dan carousel yang dapat langsung digunakan. Selain itu, Bootstrap memiliki sistem utilitas warna teks yang siap pakai, misalnya class `text-danger` untuk warna merah, `text-primary` untuk warna biru, `text-success` untuk warna hijau, `text-warning` untuk warna kuning, dan `text-dark` untuk warna hitam. Fitur ini membantu pengembang memberikan penekanan visual pada teks tanpa perlu menambahkan CSS secara manual sehingga tampilan website tetap konsisten dan mudah dikelola.

### Penjelasan Bootstrap

Kode HTML pada modul ini digunakan untuk membuat tampilan halaman web bertema Ramadan Kareem menggunakan framework Bootstrap. Tampilan disusun dengan sistem grid Bootstrap serta memanfaatkan berbagai utility class dan komponen.

## Task 4: Mode Suci (Edisi Ramadan)
### Source code index.html

```html
<!-- 2311102063
Anisa Yasaroh
IF-11-REG05 -->

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Profil</title>

  <style>
    body {
      font-family: Arial;
      background: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .box {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 340px;
    }

    button {
      padding: 10px 15px;
      background: blue;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background: darkblue;
    }

    #hasil-profil {
      margin-top: 15px;
      display: flex;
      justify-content: center;
    }

    table {
      margin-top: 10px;
      border-collapse: collapse;
      font-size: 14px;
    }

    td {
      padding: 6px 10px;
    }

    td:first-child {
      font-weight: bold;
      text-align: left;
      white-space: nowrap;
    }

    td:last-child {
      text-align: left;
    }
  </style>
</head>

<body>

  <div class="box">
    <h2>Data Profil</h2>

    <button onclick="tampilkanProfil()">Tampilkan Profil</button>

    <div id="hasil-profil"></div>
  </div>

  <script>
    function tampilkanProfil() {
      fetch('data.php')
        .then(response => response.json())
        .then(data => {
          document.getElementById("hasil-profil").innerHTML =
            "<table>" +
            "<tr><td>Nama</td><td>: " + data.nama + "</td></tr>" +
            "<tr><td>Pekerjaan</td><td>: " + data.pekerjaan + "</td></tr>" +
            "<tr><td>Lokasi</td><td>: " + data.lokasi + "</td></tr>" +
            "</table>";
        })
        .catch(error => {
          document.getElementById("hasil-profil").innerHTML = "Error";
        });
    }
  </script>

</body>

</html>
```
### Source code data.php
```
<?php
header('Content-Type: application/json');

$data = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

echo json_encode($data);
?>
``` 
### Screenshot Output
<img src="outputrmd.jpg" alt="Keterangan Foto" width="100%">

### Penjelasan Code

Kode HTML pada modul ini membangun halaman web bertema Ramadan Kareem sepenuhnya menggunakan Bootstrap tanpa CSS tambahan. Struktur halaman memanfaatkan grid system Bootstrap untuk membagi konten menjadi dua bagian utama: bagian teks ucapan Ramadan di atas dan empat card informasi di bawah yang menampilkan Jadwal Sholat, Hadist, Ibadah, dan Berbagi. Gambar latar menutupi seluruh layar dengan overlay semi-transparan agar teks dan kartu tetap terbaca dengan jelas. Setiap card menggunakan utility class Bootstrap untuk warna teks `text-white`, `text-warning`, latar belakang `bg-dark`, `bg-opacity-50`, padding, border, dan bayangan `shadow-sm` sehingga tampilan terlihat elegan dan konsisten.

Semua elemen kartu menggunakan class Bootstrap untuk mengatur teks, padding, border, bayangan, dan posisi konten di dalam card. Icon pada setiap card ditambahkan melalui Bootstrap Icons untuk menampilkan simbol visual sesuai tema masing-masing. Layout dan posisi seluruh elemen, termasuk badge Ramadan 1447 H, diatur dengan utility class Bootstrap seperti `d-flex`, `flex-column`, `align-items-center`, dan `justify-content-center` agar konten tetap terpusat dan responsif di berbagai ukuran layar. 