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

<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>

  <h3>MODUL 10 <br> AJAX</h3>

  <img width="200" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />

<br /><br />

  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Arsya Fathiha Rahman</strong><br>
    <strong>2311102152</strong><br>
    <strong>S1 IF-11-REG05</strong>
  </p>

  <h3>Dosen Pengampu :</h3>
  <p><strong>Dedi Agung Prabowo, S.Kom., M.Kom</strong></p>

  <h4>Asisten Praktikum :</h4>
  <p>
    Apri Pandu Wicaksono<br>
    Hamka Zaenul Ardi
  </p>

  <h3>
    LABORATORIUM HIGH PERFORMANCE <br>
    FAKULTAS INFORMATIKA <br>
    UNIVERSITAS TELKOM PURWOKERTO <br>
    2026
  </h3>
</div>

---

# 📚 Dasar Teori

## 1. AJAX

AJAX (Asynchronous JavaScript and XML) adalah teknik dalam pengembangan web yang memungkinkan pengambilan data dari server tanpa perlu me-refresh halaman. Dengan AJAX, website menjadi lebih cepat, interaktif, dan user-friendly karena proses pertukaran data dilakukan di background.

---

## 2. Fetch API

Fetch API merupakan cara modern dalam JavaScript untuk mengambil data dari server secara asynchronous. Dengan menggunakan `fetch()`, data dapat diambil dalam format JSON dan langsung ditampilkan ke halaman web dengan lebih sederhana dibandingkan metode lama.

---

## 3. PHP

PHP adalah bahasa pemrograman yang berjalan di sisi server (server-side). Dalam program ini, PHP digunakan untuk menyediakan data dalam bentuk JSON yang nantinya akan diambil oleh JavaScript.

---

## 4. JSON

JSON (JavaScript Object Notation) adalah format pertukaran data yang ringan dan mudah dibaca. JSON digunakan sebagai penghubung antara server (PHP) dan client (JavaScript).

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

Program ini terdiri dari dua bagian utama, yaitu server dan client. Pada bagian server, digunakan file PHP (`data.php`) yang berfungsi untuk menyediakan data dalam bentuk array. Data tersebut kemudian diubah menjadi JSON menggunakan `json_encode()` agar dapat dikirim ke client.

Pada bagian client, digunakan HTML dan JavaScript. Ketika tombol diklik, JavaScript akan mengambil data dari server menggunakan Fetch API tanpa perlu reload halaman. Data yang diterima kemudian ditampilkan ke dalam bentuk card agar lebih rapi dan menarik.

Dengan konsep ini, proses menjadi lebih cepat, interaktif, dan efisien.

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

