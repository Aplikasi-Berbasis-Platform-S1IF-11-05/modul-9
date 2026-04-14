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
    <strong>Faizal Abdilah </strong>
    <br>
    <strong>2311102307</strong>
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

---


# 📚 Dasar Teori

---

## 1. AJAX

AJAX (Asynchronous JavaScript and XML) merupakan teknik dalam pengembangan web yang digunakan untuk mengambil atau mengirim data ke server tanpa perlu melakukan reload halaman secara keseluruhan. Dengan adanya AJAX, proses pertukaran data bisa dilakukan di belakang layar (background), sehingga pengguna tetap bisa berinteraksi dengan halaman tanpa gangguan.

Penggunaan AJAX membuat tampilan website terasa lebih responsif dan cepat. Misalnya, ketika menampilkan data profil atau melakukan pencarian, hasil bisa langsung muncul tanpa harus memuat ulang halaman. Hal ini tentu meningkatkan pengalaman pengguna karena prosesnya jadi lebih efisien dan tidak membuang waktu.

---

## 2. Fetch API

Fetch API adalah fitur pada JavaScript yang digunakan untuk mengambil data dari server dengan cara yang lebih modern dibandingkan metode lama seperti XMLHttpRequest. Fetch API bekerja secara asynchronous dengan konsep Promise, sehingga penulisan kode menjadi lebih rapi dan mudah dipahami.

Dengan menggunakan `fetch()`, kita bisa mengirim request ke server, lalu menerima response dalam bentuk JSON atau format lainnya. Setelah data diterima, data tersebut bisa langsung diolah dan ditampilkan ke halaman web. Karena penggunaannya yang simpel dan fleksibel, Fetch API saat ini lebih sering dipakai dalam pengembangan web modern.

---

## 3. PHP

PHP merupakan bahasa pemrograman yang berjalan di sisi server (server-side scripting). Artinya, semua proses pengolahan data dilakukan di server sebelum hasilnya dikirim ke browser dalam bentuk HTML atau JSON.

Dalam program ini, PHP digunakan sebagai penyedia data sederhana. Data disimpan dalam bentuk array, lalu diubah menjadi format JSON menggunakan fungsi `json_encode()`. Setelah itu, data dikirim ke client dan ditampilkan menggunakan JavaScript. Dengan cara ini, PHP berperan sebagai penghubung antara data dan tampilan.

---

## 4. JSON

JSON (JavaScript Object Notation) adalah format data yang digunakan untuk pertukaran informasi antara server dan client. Struktur JSON terdiri dari pasangan key dan value, sehingga mudah dibaca dan dipahami.

JSON sering digunakan karena ringan dan cepat dalam proses pengiriman data. Dalam konteks AJAX, JSON menjadi format utama karena bisa langsung diproses oleh JavaScript tanpa perlu konversi yang rumit. Oleh karena itu, JSON sangat cocok digunakan untuk aplikasi web yang membutuhkan pertukaran data secara cepat dan efisien.

---

# 💻 Tugas 10 — AJAX

## 1. Source Code

### a. File Server (`index.html`)

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AJAX Profil Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Data Profil</h1>
        
        <button onclick="ambilData()">Tampilkan Profil</button>

        <div id="hasil-profil"></div>
    </div>

    <script>
        function ambilData() {
            fetch('data.php')
                .then(response => response.json())
                .then(data => {
                    let output = "";

                    data.forEach(item => {
                        output += `
                            <div class="card">
                                Nama: ${item.nama} <br>
                                Pekerjaan: ${item.pekerjaan} <br>
                                Lokasi: ${item.lokasi}
                            </div>
                        `;
                    });

                    document.getElementById("hasil-profil").innerHTML = output;
                })
                .catch(error => {
                    console.log("Error:", error);
                });
        }
    </script>

</body>
</html>
```

---

### b. File Client (`api_user.php`)

```php
<?php
header('Content-Type: application/json');

// Data sederhana (seperti database)
$data = [
    [
        "nama" => "Budi",
        "pekerjaan" => "Web Developer",
        "lokasi" => "Jakarta"
    ],
    [
        "nama" => "Siti",
        "pekerjaan" => "UI Designer",
        "lokasi" => "Bandung"
    ],
    [
        "nama" => "Andi",
        "pekerjaan" => "Data Analyst",
        "lokasi" => "Surabaya"
    ]
];

// Ubah ke JSON
echo json_encode($data);
?>
```

---




