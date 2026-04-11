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
    <strong>Fattah Rizqy Adhipratama</strong>
    <br>
    <strong>2311102019</strong>
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
AJAX (Asynchronous JavaScript and XML) adalah teknik dalam pengembangan web yang memungkinkan pertukaran data antara browser dan server dilakukan secara asynchronous tanpa harus me-refresh seluruh halaman. Dengan AJAX, aplikasi web menjadi lebih interaktif, cepat, dan nyaman digunakan karena hanya bagian tertentu dari halaman yang diperbarui sesuai kebutuhan pengguna. Konsep ini memanfaatkan JavaScript, DOM, dan objek XMLHttpRequest atau Fetch API untuk mengirim serta menerima data dari server di belakang layar, sehingga pengalaman pengguna menjadi lebih responsif.
</p>

<p align="justify">
Dalam implementasinya, AJAX bekerja saat terjadi suatu event, seperti tombol diklik atau halaman selesai dimuat, lalu JavaScript mengirim request ke server untuk mengambil atau mengirim data. Setelah server memberikan response, data tersebut langsung diproses dan ditampilkan pada elemen tertentu di halaman menggunakan DOM tanpa memuat ulang halaman secara keseluruhan. Teknik ini sangat sering digunakan pada fitur modern seperti live search, auto save, validasi form real-time, chat, dan notifikasi dinamis, karena mampu meningkatkan efisiensi komunikasi data sekaligus memperbaiki user experience pada website.
</p>

# Tugas 9 - Ajax
## 1. Source Code index.html
```
<!-- 2311102019
Fattah Rizqy Adhipratama
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tugas Modul 9 – AJAX</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />

  <style>
    /* CSS Variables */
    :root {
      --bg:        #0d0f14;
      --surface:   #151820;
      --border:    #252a36;
      --accent:    #4fffb0;
      --accent2:   #ff6b6b;
      --text:      #e8eaf2;
      --muted:     #6b7280;
      --card-glow: rgba(79, 255, 176, 0.08);
    }

    /* Reset & Base */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Syne', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      overflow: hidden;
    }

    /* Background grid */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(var(--border) 1px, transparent 1px),
        linear-gradient(90deg, var(--border) 1px, transparent 1px);
      background-size: 48px 48px;
      opacity: .35;
      pointer-events: none;
    }

    /* Container */
    .container {
      position: relative;
      width: 100%;
      max-width: 520px;
      text-align: center;
    }

    /* Tag kecil di atas */
    .tag {
      display: inline-block;
      font-family: 'DM Mono', monospace;
      font-size: .7rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--accent);
      border: 1px solid var(--accent);
      border-radius: 99px;
      padding: .25rem .75rem;
      margin-bottom: 1.25rem;
      opacity: .85;
    }

    h1 {
      font-size: clamp(1.6rem, 5vw, 2.4rem);
      font-weight: 800;
      line-height: 1.15;
      margin-bottom: .5rem;
    }

    h1 span { color: var(--accent); }

    .subtitle {
      color: var(--muted);
      font-size: .9rem;
      margin-bottom: 2.5rem;
      font-family: 'DM Mono', monospace;
    }

    /* Tombol */
    #btn-ambil {
      position: relative;
      background: var(--accent);
      color: #0d0f14;
      font-family: 'Syne', sans-serif;
      font-weight: 700;
      font-size: 1rem;
      letter-spacing: .04em;
      border: none;
      border-radius: 8px;
      padding: .85rem 2.4rem;
      cursor: pointer;
      transition: transform .15s, box-shadow .15s;
      box-shadow: 0 0 24px rgba(79,255,176,.3);
    }

    #btn-ambil:hover  { transform: translateY(-2px); box-shadow: 0 0 36px rgba(79,255,176,.5); }
    #btn-ambil:active { transform: translateY(0);    box-shadow: 0 0 16px rgba(79,255,176,.2); }

    #btn-ambil.loading {
      pointer-events: none;
      opacity: .7;
    }

    /* Spinner */
    .spinner {
      display: none;
      width: 16px; height: 16px;
      border: 2px solid #0d0f14;
      border-top-color: transparent;
      border-radius: 50%;
      animation: spin .6s linear infinite;
      margin: 0 auto;
    }
    .loading .spinner { display: inline-block; }
    .loading .btn-text { display: none; }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* Kartu Hasil */
    #hasil-profil {
      margin-top: 2rem;
      min-height: 56px;
    }

    .profil-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 1.5rem 2rem;
      box-shadow: 0 0 40px var(--card-glow);
      animation: fadeUp .45s cubic-bezier(.16,1,.3,1) both;
    }
```
**Source Code Lengkap:** [index.html](./index.html)

## 2. Source Code data.php
```
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$profil = [
    'nama'      => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi'    => 'Jakarta'
];
echo json_encode($profil);
?>
```

# Output
![alt text](<Screenshot (1184).png>)

# Penjelasan
<p align="justify">
Program ini terdiri dari dua file yang bekerja sama, yaitu data.php sebagai server dan index.html sebagai client. File data.php bertugas menyimpan data profil berupa array PHP yang berisi nama, pekerjaan, dan lokasi, lalu mengubahnya menjadi format JSON menggunakan json_encode() dan mengirimkannya dengan header Content-Type: application/json. Di sisi client, file index.html menampilkan sebuah tombol "Tampilkan Profil" yang ketika diklik akan memicu fungsi JavaScript menggunakan fetch() untuk mengirim permintaan HTTP ke data.php secara asinkron (tanpa reload halaman), kemudian respons JSON yang diterima di-parse menggunakan .json() dan hasilnya ditampilkan ke dalam elemen `<div id="hasil-profil">` dengan format Nama: Budi | Pekerjaan: Web Developer | Lokasi: Jakarta, sementara jika terjadi kesalahan pada proses pengambilan data maka pesan error akan ditampilkan melalui blok .catch().
</p>