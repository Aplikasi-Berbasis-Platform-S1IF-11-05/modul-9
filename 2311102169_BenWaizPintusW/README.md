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
    <strong>Ben Waiz Pintus Widyosaputro</strong>
    <br>
    <strong>2311102169</strong>
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
AJAX (Asynchronous JavaScript and XML) merupakan teknik dalam pengembangan web yang memungkinkan halaman web berkomunikasi dengan server secara asynchronous (tidak sinkron) tanpa harus melakukan reload seluruh halaman. Dengan AJAX, data dapat dikirim dan diterima di belakang layar menggunakan JavaScript, sehingga hanya bagian tertentu dari halaman yang diperbarui. Hal ini membuat aplikasi web menjadi lebih cepat, responsif, dan memberikan pengalaman pengguna yang lebih baik dibandingkan metode tradisional yang memerlukan refresh halaman setiap kali terjadi interaksi.
</p>

<p align="justify">
AJAX bekerja dengan memanfaatkan objek seperti XMLHttpRequest atau metode modern seperti fetch() pada JavaScript untuk mengirim request ke server, kemudian server (misalnya menggunakan PHP) akan memproses permintaan tersebut dan mengembalikan data, umumnya dalam format JSON. Data yang diterima selanjutnya diolah dan ditampilkan ke dalam halaman web melalui manipulasi DOM. Dalam implementasinya, AJAX sering digunakan untuk fitur seperti live search, validasi form tanpa reload, pengambilan data secara dinamis, serta update konten secara real-time. Dengan kombinasi HTML, CSS, JavaScript, dan bahasa server-side seperti PHP, AJAX menjadi salah satu teknologi penting dalam pengembangan aplikasi web interaktif modern.
</p>

# Tugas 9 - Ajax
## 1. Source Code index.html
```
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AJAX Profil</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
        }

        .profile-card {
            display: none;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .loading {
            display: none;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4 text-center" style="width: 350px; border-radius: 20px;">
        
        <h3 class="mb-3">👤 Profil Mahasiswa</h3>

        <button id="btnProfil" class="btn btn-primary mb-3">
            Tampilkan Profil
        </button>

        <!-- Loading -->
        <div id="loading" class="loading">
            <div class="spinner-border text-primary"></div>
            <p class="mt-2">Mengambil data...</p>
        </div>

        <!-- Card Profil -->
        <div id="profileCard" class="profile-card">
            <div class="card mt-3 shadow-sm">
                <div class="card-body">
                    <h5 id="nama" class="card-title"></h5>
                    <p id="pekerjaan" class="card-text"></p>
                    <p id="lokasi" class="text-muted"></p>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
document.getElementById("btnProfil").addEventListener("click", function() {

    // tampilkan loading
    document.getElementById("loading").style.display = "block";
    document.getElementById("profileCard").style.display = "none";

    fetch("data.php")
        .then(response => response.json())
        .then(data => {

            // isi data
            document.getElementById("nama").innerText = data.nama;
            document.getElementById("pekerjaan").innerText = "💼 " + data.pekerjaan;
            document.getElementById("lokasi").innerText = "📍 " + data.lokasi;

            // sembunyikan loading, tampilkan card
            document.getElementById("loading").style.display = "none";
            document.getElementById("profileCard").style.display = "block";
        })
        .catch(error => {
            document.getElementById("loading").innerHTML = "❌ Gagal mengambil data";
            console.error(error);
        });

});
</script>

</body>
</html>
```

## 2. Source Code data.php
```
<?php
header('Content-Type: application/json');

// Data sederhana (array asosiatif)
$data = [
    "nama" => "Budi",
    "pekerjaan" => "Web Developer",
    "lokasi" => "Jakarta"
];

// Ubah ke JSON dan tampilkan
echo json_encode($data);
?>
```

# Output
![alt text](<p1.png>)

# Penjelasan
<p align="justify">
Program ini merupakan implementasi AJAX pada halaman web yang menampilkan data profil secara dinamis tanpa perlu melakukan reload. Pada sisi server, file data.php berfungsi sebagai penyedia data dalam bentuk array asosiatif yang kemudian dikonversi menjadi format JSON menggunakan json_encode() dan dikirim ke client dengan header application/json. Pada sisi client, file index.html menggunakan Bootstrap untuk tampilan yang modern serta JavaScript dengan method fetch() untuk mengambil data dari server ketika tombol "Tampilkan Profil" diklik. Selama proses pengambilan data, ditampilkan animasi loading berupa spinner, kemudian setelah data berhasil diterima, informasi seperti nama, pekerjaan, dan lokasi ditampilkan dalam bentuk card dengan efek animasi fade-in. Struktur ini memanfaatkan event listener, manipulasi DOM, serta penanganan error untuk memastikan interaksi pengguna lebih responsif, menarik, dan tidak memerlukan reload halaman.
</p>