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
    <strong>Arsya Fathiha Rahman</strong>
    <br>
    <strong>2311102152</strong>
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

### a. File Server (`data.php`)

```php
<?php
header('Content-Type: application/json');

$data = [
    [
        "nama" => "Arsya Fathiha Rahman",
        "pekerjaan" => "Frontend Developer",
        "lokasi" => "Purwokerto"
    ],
    [
        "nama" => "Charles Leker",
        "pekerjaan" => "UI/UX Designer",
        "lokasi" => "Bandung"
    ],
    [
        "nama" => "Gabriel Guevara",
        "pekerjaan" => "Backend Developer",
        "lokasi" => "Jakarta"
    ]
];

echo json_encode($data);
?>
```

---

### b. File Client (`index.html`)

```html
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>📡 Data Profil CV Arsya</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Container */
.container {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    text-align: center;
    width: 90%;
    max-width: 900px;
}

/* Title */
h1 {
    color: white;
    margin-bottom: 25px;
}

/* Button */
button {
    padding: 12px 25px;
    border: none;
    border-radius: 25px;
    background: white;
    color: #ff5e78;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
}

/* Cards */
#hasil-profil {
    margin-top: 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 20px;
}

.card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    text-align: left;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.card h3 {
    color: #ff5e78;
}
</style>
</head>

<body>

<div class="container">
    <h1>📡 Data Profil CV Arsya</h1>
    <button onclick="loadData()">Tampilkan Profil</button>
    <div id="hasil-profil"></div>
</div>

<script>
function loadData() {
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
            let output = '';

            data.forEach(item => {
                output += `
                    <div class="card">
                        <h3>${item.nama}</h3>
                        <p><strong>Pekerjaan:</strong> ${item.pekerjaan}</p>
                        <p><strong>Lokasi:</strong> ${item.lokasi}</p>
                    </div>
                `;
            });

            document.getElementById('hasil-profil').innerHTML = output;
        });
}
</script>

</body>
</html>
```

---

# 🧠 Penjelasan Program

Program ini dibuat dengan dua bagian utama, yaitu server dan client, yang saling terhubung untuk menampilkan data secara dinamis tanpa perlu reload halaman.

Pada bagian server, digunakan file data.php yang berfungsi sebagai penyedia data. Di dalam file ini, data disimpan dalam bentuk array yang berisi beberapa informasi seperti nama, pekerjaan, dan lokasi. Setelah itu, data tersebut diubah ke format JSON menggunakan fungsi json_encode(). Tujuannya supaya data bisa dikirim dengan format yang ringan dan mudah dibaca oleh JavaScript. Selain itu, ditambahkan juga header('Content-Type: application/json') agar browser mengetahui bahwa data yang dikirim berupa JSON, bukan HTML biasa.

Kemudian pada bagian client, digunakan file index.php yang berisi struktur tampilan (HTML), styling (CSS), dan logika interaksi menggunakan JavaScript. Di halaman ini terdapat tombol yang berfungsi untuk mengambil data dari server. Saat tombol tersebut diklik, JavaScript akan menjalankan fungsi fetch() untuk mengirim request ke file data.php. Proses ini berjalan secara asynchronous, artinya pengambilan data dilakukan di background tanpa mengganggu tampilan halaman.

Setelah data berhasil diambil, response dari server akan dikonversi menjadi format JSON menggunakan .json(). Selanjutnya, data tersebut diproses menggunakan perulangan (loop), sehingga setiap data bisa ditampilkan satu per satu ke dalam halaman. Data ditampilkan dalam bentuk card agar tampilannya lebih rapi, terstruktur, dan enak dilihat.

Dengan konsep seperti ini, proses pertukaran data antara server dan client menjadi lebih efisien karena tidak perlu reload halaman setiap kali mengambil data. Hal ini membuat website terasa lebih cepat dan interaktif. Selain itu, penggunaan Fetch API juga membuat penulisan kode menjadi lebih sederhana dan mudah dipahami dibandingkan metode lama seperti XMLHttpRequest.

Secara keseluruhan, program ini menerapkan konsep AJAX, di mana client mengirim request ke server melalui index.php, kemudian server (data.php) mengirimkan response dalam bentuk JSON, lalu data tersebut langsung ditampilkan ke halaman. Dengan cara ini, website jadi terlihat lebih modern karena bisa menampilkan data secara real-time tanpa reload halaman.

---

# 🚀 Cara Menjalankan Program

1. Simpan project ke folder:

```
D:\XAMPP\htdocs\modul-10\
```

2. Jalankan Apache di XAMPP

3. Buka browser dan akses:

```
http://localhost/modul-10/index.html
```

4. Klik tombol **"Tampilkan Profil"**

---


# 📸 Output

<img width="1920" height="1080" alt="DataProfilRun" src="https://github.com/user-attachments/assets/f9347308-80cc-47d1-b054-a53cf2c92d4f" />


