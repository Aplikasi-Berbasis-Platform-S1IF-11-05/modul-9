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
    <strong>Rakha Yudhistira</strong>
    <br>
    <strong>2311102010</strong>
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

# Dasar Teori

<p align="justify">
AJAX adalah teknik pengembangan web yang memungkinkan pertukaran data antara client dan server secara asinkron menggunakan JavaScript, sehingga bagian tertentu dari halaman web dapat diperbarui tanpa perlu melakukan reload secara keseluruhan. Proses ini bekerja dengan mengirimkan permintaan di latar belakang menggunakan Fetch API atau XMLHttpRequest, kemudian server merespons dengan format data ringan seperti JSON. Dengan memindahkan beban pemrosesan data ke latar belakang, AJAX mampu menghemat penggunaan bandwidth serta menciptakan pengalaman pengguna yang lebih cepat, responsif, dan interaktif layaknya aplikasi native.
</p>


# Source Code data.php
```
<?php

// Mengatur header agar browser tahu bahwa outputnya adalah JSON
header('Content-Type: application/json');

// Membuat array database sederhana
$data = [
    'nama'      => 'Rakha Yudhistira',
    'pekerjaan' => 'Fullstack Developer',
    'lokasi'    => 'Purwokerto'
];

// Mengubah array PHP menjadi format JSON dan menampilkannya
echo json_encode($data);

?>


```
# Source Code index.html
```
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 10 - AJAX Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px);
        }
        #hasil-profil {
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
            padding: 15px;
            border-radius: 12px;
            background-color: #f8f9fa;
            border: 1px dashed #dee2e6;
        }
        .data-text {
            font-size: 1.05rem;
            color: #333;
            line-height: 1.6;
        }
        .btn-fetch {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-fetch:hover {
            opacity: 0.9;
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <div class="mb-4">
            <h3 class="fw-bold">AJAX Profile Data</h3>
            <p class="text-muted small">Modul 10 - Pemrograman Web</p>
        </div>

        <button id="btn-tampil" class="btn btn-primary btn-fetch shadow-sm">
            Tampilkan Profil
        </button>
        
        <div id="hasil-profil">
            <span class="text-muted small italic">Klik tombol untuk memuat data</span>
        </div>
    </div>

    <script>
        document.getElementById('btn-tampil').addEventListener('click', function() {
            const display = document.getElementById('hasil-profil');
            const btn = this;

            // Efek Loading: Disable tombol & ganti teks
            btn.disabled = true;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm"></span> Loading...`;
            display.innerHTML = `<div class="spinner-grow text-primary spinner-grow-sm" role="status"></div>`;

            // Simulasi delay sedikit agar efek loading terlihat (Opsional)
            setTimeout(() => {
                fetch('data.php')
                    .then(response => {
                        if (!response.ok) throw new Error("File tidak ditemukan");
                        return response.json();
                    })
                    .then(data => {
                        display.innerHTML = `
                            <div class="data-text">
                                <strong>Nama:</strong> ${data.nama} <br>
                                <strong>Pekerjaan:</strong> ${data.pekerjaan} <br>
                                <strong>Lokasi:</strong> ${data.lokasi}
                            </div>
                        `;
                    })
                    .catch(error => {
                        display.innerHTML = `<span class="text-danger small">Gagal: ${error.message}</span>`;
                    })
                    .finally(() => {
                        // Kembalikan tombol ke keadaan semula
                        btn.disabled = false;
                        btn.innerHTML = "Tampilkan Profil";
                    });
            }, 500);
        });
    </script>

</body>
</html>


```


# Screenshoot Program
<img width="1901" height="961" alt="image" src="Screenshot (725).png"/>
<br>

<img width="1901" height="961" alt="image" src="Screenshot (726).png"/>




# Penjelasan
<p align="justify">

Program ini menerapkan teknologi AJAX menggunakan Fetch API untuk melakukan pertukaran data secara asinkron antara client dan server. File `data.php` berperan sebagai API sederhana yang menyediakan data dalam format JSON, sementara index.html berfungsi sebagai antarmuka yang mengirimkan permintaan (request) saat tombol diklik. Dengan metode ini, data dari server dapat diambil dan ditampilkan langsung ke dalam elemen HTML tanpa perlu melakukan muat ulang (reload) halaman secara keseluruhan. Selain itu, penggunaan Bootstrap 5 dan animasi spinner memberikan umpan balik visual yang informatif kepada pengguna selama proses pengambilan data berlangsung, menciptakan pengalaman pengguna yang lebih cepat, mulus, dan modern.
</p>