/**
 * Modul Pemuat Profil AJAX.
 * 
 * Modul ini menangani pengambilan data profil secara asinkron dari server (api/data.php).
 * Menampilkan status pemuatan melalui spinner pada tombol dan merender hasil ke dalam DOM.
 * Implementasi menggunakan Fetch API dengan penanganan kesalahan (error handling).
 * 
 * @module AJAX_Profile
 * @author Rozhak <2311102293>
 * @version 1.0.0
 * @since 2026-04-11
 */
document.addEventListener('DOMContentLoaded', () => {
    const btnTampil = document.getElementById('btn-tampil');
    const hasilProfil = document.getElementById('hasil-profil');
    
    if (!btnTampil || !hasilProfil) return;

    btnTampil.addEventListener('click', async () => {
        const originalText = btnTampil.innerText;
        
        btnTampil.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            <span>Mengambil...</span>
        `;
        btnTampil.disabled = true;
        btnTampil.setAttribute('aria-expanded', 'true');

        try {
            const response = await fetch('../api/data.php');

            if (!response.ok) {
                throw new Error(`HTTP Error! Status: ${response.status}`);
            }
            
            const data = await response.json();

            hasilProfil.innerHTML = `
                <div class="result">
                    <div class="result-item">
                        <span class="result-label">Nama</span>
                        <span class="result-value">${data.nama}</span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Pekerjaan</span>
                        <span class="result-value">${data.pekerjaan}</span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Lokasi</span>
                        <span class="result-value">${data.lokasi}</span>
                    </div>
                </div>
            `;
            
            hasilProfil.style.borderStyle = 'solid';
            hasilProfil.style.background = 'transparent';

        } catch (error) {
            hasilProfil.innerHTML = `
                <div class="alert-danger">
                    Gagal memuat data dari server.
                </div>
            `;
            hasilProfil.style.borderStyle = 'solid';
        } finally {
            btnTampil.innerHTML = `<span>${originalText}</span>`;
            btnTampil.disabled = false;
            btnTampil.setAttribute('aria-expanded', 'false');
        }
    });
});