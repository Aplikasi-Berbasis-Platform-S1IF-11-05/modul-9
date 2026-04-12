const tombolProfil = document.getElementById("btn-profil");
const hasilProfil = document.getElementById("hasil-profil");

const setResult = (pesan, status = "") => {
  hasilProfil.textContent = pesan;
  hasilProfil.classList.remove("loading", "success", "error");
  if (status) {
    hasilProfil.classList.add(status);
  }
};

tombolProfil.addEventListener("click", async () => {
  tombolProfil.disabled = true;
  setResult("Mengambil data dari server...", "loading");

  try {
    const response = await fetch("data.php", {
      cache: "no-store",
    });

    if (!response.ok) {
      throw new Error("Gagal mengambil data dari server.");
    }

    const data = await response.json();
    const profilTeks = `Nama: ${data.nama ?? "-"} | Pekerjaan: ${data.pekerjaan ?? "-"} | Lokasi: ${data.lokasi ?? "-"} | Email: ${data.email ?? "-"} | Telepon: ${data.telepon ?? "-"}`;
    setResult(profilTeks, "success");
  } catch (error) {
    setResult("Terjadi kesalahan saat mengambil data profil.", "error");
    console.error(error);
  } finally {
    tombolProfil.disabled = false;
  }
});
