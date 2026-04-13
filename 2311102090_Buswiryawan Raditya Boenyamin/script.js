// 2311102090_Buswiryawan Raditya Boenyamin_S1IF-11-05
const btn      = document.getElementById('btn-tampilkan');
const hasil    = document.getElementById('hasil-profil');
const loading  = document.getElementById('loading');
const errorMsg = document.getElementById('error-msg');

btn.addEventListener('click', async () => {
    hasil.innerHTML        = '';
    errorMsg.style.display = 'none';
    loading.style.display  = 'block';
    btn.disabled           = true;
    btn.textContent        = 'Memuat...';

    try {
        const response = await fetch('data.php');

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        tampilkanProfil(data);

    } catch (err) {
        console.warn('Fetch gagal:', err.message);
        errorMsg.textContent  = 'Gagal mengambil data. Pastikan data.php berjalan di server.';
        errorMsg.style.display = 'block';

    } finally {
        loading.style.display = 'none';
        btn.disabled          = false;
        btn.textContent       = 'Muat Ulang';
    }
});

function tampilkanProfil(data) {
    data.forEach((profil, index) => {
        const card = document.createElement('div');
        card.className = 'profil-card';
        card.style.animationDelay = `${index * 80}ms`;

        const inisial = profil.nama.charAt(0).toUpperCase();

        const formatTeks = `Nama: ${profil.nama} | Pekerjaan: ${profil.pekerjaan} | Lokasi: ${profil.lokasi}`;

        card.innerHTML = `
            <div class="avatar">${inisial}</div>
            <div class="profil-info">
                <div class="profil-nama">${profil.nama}</div>
                <div class="profil-detail">
                    💼 <span>${profil.pekerjaan}</span>
                    &nbsp;&nbsp;📍 <span>${profil.lokasi}</span>
                </div>
                <div class="profil-text">
                    <strong>OUTPUT:</strong> ${formatTeks}
                </div>
            </div>
        `;

        hasil.appendChild(card);
    });
}