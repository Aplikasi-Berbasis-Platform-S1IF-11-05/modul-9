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
        <strong>Rasyid Nafsyarie</strong>
        <br>
        <strong>2311102011</strong>
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

AJAX (Asynchronous JavaScript and XML) adalah teknik dalam pengembangan web yang memungkinkan aplikasi melakukan pertukaran data dengan server secara asinkron (tanpa reload halaman). Dengan AJAX, sebagian konten pada halaman web dapat diperbarui secara dinamis tanpa harus memuat ulang seluruh halaman, sehingga meningkatkan performa dan pengalaman pengguna (UX).

AJAX bekerja dengan memanfaatkan objek seperti XMLHttpRequest atau Fetch API untuk mengirim dan menerima data dari server (biasanya dalam format JSON). Teknologi ini sering digunakan pada fitur seperti live search, auto-save, notifikasi real-time, dan form submission tanpa refresh halaman.

## Tugas Modul 10 - AJAX

### Source Code

```php
<?php
header('Content-Type: application/json');

$profil = [
    'nama' => 'Budi',
    'pekerjaan' => 'Web Developer',
    'lokasi' => 'Jakarta'
];

echo json_encode($profil);
```

**Kode Lengkap:** [index.php](index.php)

```html
<body>

    <div class="card">
        <h1>📡 Ajax Profil Viewer</h1>
        <p class="subtitle">Modul 10 — Mengambil data dari server tanpa reload</p>

        <button id="btn-profil">
            <span class="icon">👤</span>
            Tampilkan Profil
        </button>

        <div id="hasil-profil"></div>
    </div>

    <script>
        document.getElementById('btn-profil').addEventListener('click', function () {
            const hasilDiv = document.getElementById('hasil-profil');

            // Tampilkan loading
            hasilDiv.innerHTML = `
                <div class="loading">
                    <div class="spinner"></div>
                    Memuat data...
                </div>
            `;
```

**Kode Lengkap:** [index.html](index.html)

Output:
<img src="Screenshot (1133).png" alt="preview" style="width:100%; max-width:900px;">
<img src="Screenshot (1134).png" alt="preview" style="width:100%; max-width:900px;">

### Penjelasan

Website ini adalah halaman Ajax Profil Viewer yang menampilkan tombol "Tampilkan Profil" dan menggunakan fetch() untuk mengambil data JSON (nama, pekerjaan, lokasi) dari server PHP (data.php) secara asinkron. Data profil baru ditampilkan di halaman setelah tombol diklik, tanpa perlu me-reload halaman