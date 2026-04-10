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
    <strong>Fajar Ario Abdillah</strong>
    <br>
    <strong>2311102114</strong>
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

## 1. Pengertian AJAX

AJAX (*Asynchronous JavaScript and XML*) adalah teknik dalam pengembangan web yang memungkinkan halaman web untuk mengambil dan menampilkan data dari server secara asynchronous tanpa harus melakukan reload seluruh halaman. Dengan menggunakan AJAX, interaksi pengguna menjadi lebih cepat dan responsif karena hanya bagian tertentu dari halaman yang diperbarui. Saat ini, AJAX umumnya menggunakan format JSON sebagai media pertukaran data karena lebih ringan dan mudah diproses oleh JavaScript.

---

## 2. Cara Kerja AJAX

AJAX bekerja dengan cara mengirim dan menerima data antara client (browser) dan server secara asynchronous tanpa harus memuat ulang halaman. Proses ini dimulai ketika pengguna melakukan suatu aksi, seperti menekan tombol. Selanjutnya, JavaScript akan mengirim permintaan (request) ke server. Server kemudian memproses permintaan tersebut dan mengirimkan respon dalam format JSON. Data yang diterima akan diolah oleh JavaScript dan ditampilkan ke halaman web menggunakan manipulasi DOM.

### Alur kerja AJAX secara sederhana:

1. Pengguna melakukan aksi (klik tombol).
2. JavaScript mengirim request ke server.
3. Server memproses dan mengirim response (JSON).
4. JavaScript menerima data dan menampilkannya di halaman.

#### Contoh sederhana menggunakan fetch():

```html
document.getElementById("btn").addEventListener("click", function() {
  fetch("data.php")
    .then(response => response.json())
    .then(data => {
      document.getElementById("hasil-profil").innerHTML =
        "Nama: " + data.nama + 
        " | Pekerjaan: " + data.pekerjaan + 
        " | Lokasi: " + data.lokasi;
    });
});
```

---

## 3. JSON (Javascript Object Notation)

JSON (*JavaScript Object Notation*) adalah format pertukaran data yang ringan dan mudah dibaca oleh manusia maupun mesin. JSON digunakan untuk menyimpan dan mengirim data antara server dan client dalam aplikasi web, termasuk pada implementasi AJAX. Format JSON terdiri dari pasangan key dan value yang menyerupai objek pada JavaScript.

JSON banyak digunakan karena lebih sederhana dibandingkan XML serta mudah diproses oleh JavaScript menggunakan fungsi bawaan seperti `JSON.parse()` dan `JSON.stringify()`.

#### Contoh format JSON:

```html
{
  "nama": "Budi",
  "pekerjaan": "Web Developer",
  "lokasi": "Jakarta"
}
```

---

## 4. Fetch API (Javascript)

Fetch API adalah fitur modern dalam JavaScript yang digunakan untuk mengambil data dari server secara asynchronous. Fetch API menggantikan metode lama seperti XMLHttpRequest karena lebih sederhana dan berbasis *Promise*, sehingga memudahkan penanganan respon dari server.

Dengan menggunakan `fetch()`, client dapat mengirim permintaan ke server (misalnya file PHP) dan menerima data dalam berbagai format, seperti JSON.

#### Contoh penggunaan Fetch API:

```html
fetch("data.php")
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });
```

---

## 5. PHP dan JSON Encoding

PHP merupakan bahasa pemrograman yang digunakan di sisi server (*server-side*) untuk mengolah data sebelum dikirim ke client. Dalam implementasi AJAX, PHP berperan sebagai penyedia data yang akan diakses oleh JavaScript.

Untuk mengirim data ke client, PHP menggunakan fungsi `json_encode()` yang berfungsi mengubah data dalam bentuk array atau objek menjadi format JSON. Selain itu, diperlukan header `Content-Type`: `application/json` agar browser mengetahui bahwa data yang dikirim berformat JSON.

#### Contoh kode PHP (data.php):

```html
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

---

## 6. DOM (Document Object Model)

DOM (*Document Object Model*) adalah representasi struktur halaman HTML dalam bentuk objek yang dapat diakses dan dimanipulasi menggunakan JavaScript. Dengan DOM, elemen-elemen pada halaman web seperti teks, tombol, dan `<div>` dapat diubah isinya tanpa harus memuat ulang halaman.

Dalam penerapan AJAX, DOM digunakan untuk menampilkan data yang diterima dari server ke dalam elemen HTML tertentu. Misalnya, data profil yang diperoleh dari file PHP akan dimasukkan ke dalam `<div>` agar dapat langsung dilihat oleh pengguna.

#### Contoh penggunaan DOM:

```html
document.getElementById("hasil-profil").innerHTML =
  "Nama: Budi | Pekerjaan: Web Developer | Lokasi: Jakarta";
```

---

## 7. Asynchronous Programming

Asynchronous programming adalah metode pemrograman di mana proses dapat berjalan tanpa harus menunggu proses lain selesai terlebih dahulu. Dalam konteks AJAX, teknik ini memungkinkan pengambilan data dari server dilakukan di latar belakang tanpa mengganggu tampilan atau interaksi pada halaman web.

Dengan pendekatan asynchronous, halaman web tetap dapat digunakan oleh pengguna meskipun sedang terjadi proses pengambilan data. Hal ini berbeda dengan synchronous yang mengharuskan proses selesai terlebih dahulu sebelum melanjutkan ke proses berikutnya.

#### Contoh sederhana asynchronous menggunakan fetch():

```html
fetch("data.php")
  .then(response => response.json())
  .then(data => {
    console.log("Data diterima:", data);
  });

console.log("Kode ini tetap dijalankan tanpa menunggu fetch selesai");
```

---

# Tugas 10 — AJAX

## 1. Struktur Folder

```
2311102114_Fajar Ario Abdillah/
├── data.php           
├── index.html     
└── assets/
    └── Screenshot Bukti Output
```

## 2. Source Code

### a. File Server `data.php`:

File ini berfungsi sebagai penyedia data dari server. Data dibuat dalam bentuk array PHP, lalu diubah menjadi JSON menggunakan `json_encode()`.

Kode `data.php`:

```html
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

#### Penjelasan:

* `header('Content-Type: application/json');` digunakan untuk memberi informasi ke browser bahwa data yang dikirim menggunakan format JSON
* `$data = [...]` menjelaskan bahwa kode berisi data profil sederhana
* `echo json_encode($data);` menjelaskan bahwa kode mengubah array PHP menjadi format JSON dan menampilkannya sebagai reponse

### b. File Client `index.html`:

File ini berisi tampilan halaman, tombol, tempat hasil data, dan logika AJAX menggunakan JavaScript.

Kode `index.html`:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum AJAX</title>
</head>
<body>
    <h2>Praktikum AJAX</h2>
    
    <button id="btnProfil">Tampilkan Profil</button>
    
    <div id="hasil-profil" style="margin-top: 10px;"></div>

    <script>
        document.getElementById("btnProfil").addEventListener("click", function() {
            fetch("data.php")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("hasil-profil").innerHTML =
                        "Nama: " + data.nama +
                        " | Pekerjaan: " + data.pekerjaan +
                        " | Lokasi: " + data.lokasi;
                })
                .catch(error => {
                    document.getElementById("hasil-profil").innerHTML =
                        "Terjadi kesalahan saat mengambil data.";
                    console.error(error);
                });
        });
    </script>
</body>
</html>
```

### c. Cara Menjalankan Program:

Supaya lebih mudah dan efisien, saya menjalankan kode di atas dengan menggunakan XAMPP

1. Simpan Folder project di:

```bash
htdocs/praktikum-abp/modul-9/praktikum-abp/Nama_NIM
```

2. Jalankan Apache melalui XAMPP

3. Buka browser apa saja

4. Akses link ini:

```bash
http://localhost/praktikum-abp/modul-9/Nama_NIM/index.html
```

## 3. Output

### Tampilan sebelum tombol Tampilan Profil diklik:

![Bukti](assets/Screenshot%202026-04-10%20232145.png)

### Tampilan setelah tombol Tampilan Profil diklik:

![Bukti](assets/Screenshot%202026-04-10%20232306.png)