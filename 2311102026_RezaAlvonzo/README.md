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
        <strong>Reza Alvonzo</strong>
        <br>
        <strong>2311102026</strong>
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

AJAX (Asynchronous JavaScript and XML) adalah teknik pemrograman web yang memungkinkan halaman web untuk berkomunikasi dengan server secara asinkron (tanpa perlu me-refresh ulang seluruh halaman). Dengan AJAX, aplikasi web dapat mengirim dan menerima data dari server di latar belakang, kemudian memperbarui sebagian konten halaman secara dinamis tanpa mengganggu tampilan yang sudah ada. Hal ini membuat pengalaman pengguna menjadi lebih cepat, responsif, dan mirip seperti aplikasi desktop.

Secara teknis, AJAX bekerja dengan memanfaatkan beberapa teknologi sekaligus: JavaScript sebagai pengendali logika, XMLHttpRequest (atau modernnya Fetch API) sebagai mediator komunikasi dengan server, serta format data seperti JSON atau XML untuk pertukaran data. Dalam praktiknya seperti pada kode website yang telah dibuat, ketika pengguna menekan tombol "Ambil Data", JavaScript akan mengirim permintaan ke server (data.php), server memproses dan mengembalikan data dalam format JSON, lalu JavaScript menangkap respons tersebut dan menampilkannya ke dalam elemen HTML tanpa me-refresh halaman. Pendekatan ini menjadi fondasi utama dalam pengembangan Single Page Application (SPA) dan web modern yang interaktif seperti Gmail, Google Maps, atau dashboard real-time.

## Tugas Modul 10 - AJAX

### Source Code

```php
<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$profile = [
    'nama'      => 'Dr. Rendra Wijaya, M.Kom.',
    'pekerjaan' => 'Senior Fullstack Developer & AI Engineer',
    'lokasi'    => 'Jakarta, Indonesia'
];

echo json_encode($profile);
?>
```

**Kode Lengkap:** [data.php](data.php)

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncData | Asynchronous Profile Explorer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', monospace;
            background: #0c1117;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        /* Layout utama: horizontal split */
        .split-dashboard {
            max-width: 1300px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 1.8rem;
            background: transparent;
        }

        /* Panel kiri - command center */
        .command-panel {
            background: rgba(18, 25, 35, 0.92);
            backdrop-filter: blur(2px);
            border: 1px solid #2a3a44;
            border-radius: 2rem;
            padding: 2rem;
            height: fit-content;
        }

        .badge-system {
            display: inline-block;
            background: #1e3a3f;
            color: #6ee7b7;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.3rem 0.9rem;
            border-radius: 20px;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
            border: 1px solid #2e5a5f;
        }

        .command-panel h2 {
            font-size: 1.9rem;
            font-weight: 600;
            color: #ecfdf5;
            letter-spacing: -1px;
            margin-bottom: 0.75rem;
        }

        .command-desc {
            color: #8aa4b5;
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 2rem;
            border-left: 3px solid #2e7d64;
            padding-left: 1rem;
        }

        /* Tombol unik - style terminal */
        .terminal-btn {
            width: 100%;
            background: #111a20;
            border: 1.5px solid #2e5a5f;
            padding: 1rem 1.2rem;
            border-radius: 1rem;
            color: #b9f6e4;
            font-family: 'Space Grotesk', monospace;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 2rem;
        }

        .terminal-btn:hover {
            background: #1e3a3f;
            border-color: #6ee7b7;
            color: white;
            transform: translateX(4px);
        }

        .btn-icon {
            font-size: 1.2rem;
        }
```

**Kode Lengkap:** [index.html](index.html)

Output:
<img src="tombol.png" alt="preview" style="width:100%; max-width:900px;">
<img src="data.php" alt="preview" style="width:100%; max-width:900px;">

### Penjelasan

Website ini adalah dashboard pengambilan data profil secara asinkron menggunakan arsitektur horizontal split layout dengan panel kiri sebagai command center bergaya terminal dan panel kanan sebagai area live data feed. Sistem ini memanfaatkan JavaScript Fetch API untuk mengambil data dari server (file data.php) tanpa perlu me-refresh halaman, menampilkan hasilnya dalam bentuk timeline card yang informatif dengan aksen dark mode profesional.