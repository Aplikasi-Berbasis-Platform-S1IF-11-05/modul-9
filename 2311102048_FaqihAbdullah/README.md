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
        <strong>Faqih Abdullah</strong>
        <br>
        <strong>2311102048</strong>
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

AJAX (Asynchronous JavaScript and XML) adalah teknik dalam pengembangan web yang memungkinkan aplikasi melakukan pertukaran data dengan server secara asinkron (tanpa reload halaman). Dengan AJAX, sebagian konten pada halaman web dapat diperbarui secara dinamis tanpa harus memuat ulang seluruh halaman, sehingga meningkatkan performa dan pengalaman pengguna (User Experience/UX).

AJAX bekerja dengan memanfaatkan objek seperti XMLHttpRequest atau Fetch API untuk mengirim dan menerima data dari server (biasanya dalam format JSON). Teknologi ini sering digunakan pada fitur seperti live search, auto-save, notifikasi real-time, dan form submission tanpa refresh halaman.

## Tugas Modul 10 - AJAX

### Source Code

```php
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

**Kode Lengkap:** 

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2311102048 Modul 10 - AJAX </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Poppins', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background animasi floating bubbles */
        body::before,
        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }

        body::before {
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            animation-delay: 0s;
        }

        body::after {
            bottom: -100px;
            right: -100px;
            width: 350px;
            height: 350px;
            background: rgba(255, 255, 255, 0.06);
            animation-delay: 5s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(30px, -30px) rotate(120deg);
            }
            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        /* Main Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            padding: 40px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25),
                        0 0 0 1px rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255,255,255,0.4), rgba(255,255,255,0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: white;
            font-size: 28px;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-top: 8px;
        }

        /* Modern Button */
        .glass-button {
            width: 100%;
            padding: 16px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .glass-button:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: scale(1.02);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .glass-button:active {
            transform: scale(0.98);
        }

        .button-icon {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .glass-button:hover .button-icon {
            transform: translateY(2px);
        }

        /* Result Card */
        .result-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .result-title {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .result-title span {
            font-size: 18px;
        }

        /* Profile Items */
        .profile-item {
            display: flex;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            transition: transform 0.2s ease;
        }

        .profile-item:hover {
            transform: translateX(5px);
        }

        .profile-item:last-child {
            border-bottom: none;
        }

        .item-icon {
            font-size: 24px;
            min-width: 50px;
            color: rgba(255, 255, 255, 0.9);
        }

        .item-content {
            flex: 1;
        }

        .item-label {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .item-value {
            font-size: 16px;
            font-weight: 600;
            color: white;
            margin-top: 4px;
        }

        /* Skill Tags */
        .skill-tag {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
            margin-right: 8px;
            margin-top: 8px;
        }

        /* Loading State */
        .loading-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            gap: 16px;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.2);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: rgba(255, 255, 255, 0.7);
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.7;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .glass-card {
                padding: 24px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            .item-icon {
                font-size: 20px;
                min-width: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <div class="header">
            <div class="avatar">
                👨‍💻
            </div>
            <h1>Profile Explorer</h1>
            <div class="subtitle">Tekan tombol untuk menampilkan profil</div>
        </div>

        <button id="btn-tampilkan" class="glass-button">
            <span class="button-icon">✨</span>
            Tampilkan Profil
            <span class="button-icon">→</span>
        </button>

        <div id="hasil-profil" class="result-card">
            <div class="empty-state">
                <div class="empty-icon">🔘</div>
                <div>Belum ada data</div>
                <small style="opacity: 0.6;">Klik tombol di atas untuk memuat profil</small>
            </div>
        </div>
    </div>

    <script>
        const tombol = document.getElementById('btn-tampilkan');
        const hasilDiv = document.getElementById('hasil-profil');

        async function ambilDataProfil() {
            // Tampilkan loading state dengan animasi
            hasilDiv.innerHTML = `
                <div class="loading-state fade-in">
                    <div class="spinner"></div>
                    <div class="loading-text">⏳ Mengambil data profil...</div>
                </div>
            `;
            
            try {
                const response = await fetch('data.php');
                
                if (!response.ok) {
                    throw new Error('Gagal mengambil data dari server');
                }
                
                const data = await response.json();
                tampilkanDataProfil(data);
                
            } catch (error) {
                hasilDiv.innerHTML = `
                    <div class="empty-state fade-in">
                        <div class="empty-icon">⚠️</div>
                        <div style="color: #ffcccc;">Error: ${error.message}</div>
                        <small style="opacity: 0.6;">Silakan coba lagi</small>
                    </div>
                `;
                console.error('Error:', error);
            }
        }
        
        function tampilkanDataProfil(data) {
            // Format skill tags jika ada
            let skillHtml = '';
            if (data.skill) {
                const skills = data.skill.split(',');
                skills.forEach(skill => {
                    skillHtml += `<span class="skill-tag">${skill.trim()}</span>`;
                });
            }
            
            hasilDiv.innerHTML = `
                <div class="fade-in">
                    <div class="result-title">
                        <span>📋</span> INFORMASI PROFIL
                    </div>
                    
                    <div class="profile-item">
                        <div class="item-icon">👤</div>
                        <div class="item-content">
                            <div class="item-label">Nama Lengkap</div>
                            <div class="item-value">${data.nama}</div>
                        </div>
                    </div>
                    
                    <div class="profile-item">
                        <div class="item-icon">💼</div>
                        <div class="item-content">
                            <div class="item-label">Pekerjaan</div>
                            <div class="item-value">${data.pekerjaan}</div>
                        </div>
                    </div>
                    
                    <div class="profile-item">
                        <div class="item-icon">📍</div>
                        <div class="item-content">
                            <div class="item-label">Lokasi</div>
                            <div class="item-value">${data.lokasi}</div>
                        </div>
                    </div>
                    
                    ${data.email ? `
                    <div class="profile-item">
                        <div class="item-icon">📧</div>
                        <div class="item-content">
                            <div class="item-label">Email</div>
                            <div class="item-value">${data.email}</div>
                        </div>
                    </div>
                    ` : ''}
                    
                    ${data.pengalaman ? `
                    <div class="profile-item">
                        <div class="item-icon">🏆</div>
                        <div class="item-content">
                            <div class="item-label">Pengalaman</div>
                            <div class="item-value">${data.pengalaman}</div>
                        </div>
                    </div>
                    ` : ''}
                    
                    ${skillHtml ? `
                    <div class="profile-item">
                        <div class="item-icon">⚡</div>
                        <div class="item-content">
                            <div class="item-label">Skill & Keahlian</div>
                            <div>${skillHtml}</div>
                        </div>
                    </div>
                    ` : ''}
                </div>
            `;
        }
        
        tombol.addEventListener('click', ambilDataProfil);
    </script>
</body>
</html>
```
### Penjelasan

Ajax Profil Viewer adalah halaman web yang mengambil data profil (nama, pekerjaan, lokasi) dari server PHP menggunakan fetch() secara asinkron saat tombol "Tampilkan Profil" diklik. Data kemudian ditampilkan langsung di halaman tanpa perlu reload, dilengkapi dengan animasi loading dan desain glassmorphism modern.