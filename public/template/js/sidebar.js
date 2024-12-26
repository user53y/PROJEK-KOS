const toggleButton = document.getElementById('toggleButton');
const closeButton = document.getElementById('closeButton');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    mainContent.classList.toggle('shifted');
});


function updateDateTime() {
    const now = new Date();
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    document.getElementById('current-date').textContent =
        `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
}

updateDateTime();
setInterval(updateDateTime, 1000);
const pageTitle = document.getElementById('page-title');

function updatePageTitle(path) {
switch (path) {
case '/tampil-kamar':
    pageTitle.textContent = 'Data Kamar';
    break;
case '/tampil-penghuni':
    pageTitle.textContent = 'Data Penghuni';
    break;
case '/tampil-pemasukan':
    pageTitle.textContent = 'Data Pemasukan';
    break;
case '/tampil-pengeluaran':
    pageTitle.textContent = 'Data Pengeluaran';
    break;
case '/tampil-laporan':
    pageTitle.textContent = 'Cetak Laporan';
    break;
case '/kamar-tersedia':
    pageTitle.textContent = 'Pesan Kamar';
    break;
case '/cek-pembayaran':
    pageTitle.textContent = 'Cek Pembayaran';
    break;
default:
    pageTitle.textContent = 'Dashboard';

}


}
function navigate(path) {
history.pushState({}, '', path);
updatePageTitle(path);
}

window.addEventListener('popstate', () => {
updatePageTitle(window.location.pathname);
});

updatePageTitle(window.location.pathname);
