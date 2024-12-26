<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatakosController;
use App\Http\Controllers\DatakamarController;
use App\Http\Controllers\DatapenghuniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LaporanController;


//Landding Page
Route::view('/', 'welcome')->name('welcome');

//Halaman Login dan Register
Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/verify-email', function () {
    return view('auth.verify-email');
});


//Halaman dashboard
Route::get('/dashboard', [DatakosController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Routing untuk memperbarui data kos
Route::delete('/datakos/{id}', [DatakosController::class, 'destroy'])->name('datakos.destroy');
Route::get('/{id}/edit', [DatakosController::class, 'edit'])->name('edit-kos');
Route::resource('datakos', DatakosController::class);


//Routing untuk data kamar
Route::get('/tampil-kamar', [DatakamarController::class, 'index'])->name('tampil-kamar');
Route::post('/tambah-kamar', [DatakamarController::class, 'store'])->name('tambah-kamar');
Route::get('/{id}/edit', [DatakamarController::class, 'edit'])->name('edit-kamar');
Route::resource('datakamar', DatakamarController::class);
Route::get('/datakamar/export/excel', [DatakamarController::class,'excel'])->name('kamar.excel');
Route::get('/datakamar/export/pdf', [DatakamarController::class,'pdf'])->name('kamar.pdf');


//Routing untuk data penghuni
Route::get('/tampil-penghuni', [DatapenghuniController::class, 'index'])->name('tampil-penghuni');
Route::post('/tambah-penghuni', [DatapenghuniController::class, 'store'])->name('tambah-penghuni');
Route::get('/{id}/edit', [DatapenghuniController::class, 'edit'])->name('edit-penghuni');
Route::resource('datapenghuni', DatapenghuniController::class);
Route::get('/datapenghuni/export/excel', [DatapenghuniController::class,'excel'])->name('penghuni.excel');
Route::get('/datapenghuni/export/pdf', [DatapenghuniController::class,'pdf'])->name('penghuni.pdf');


// Routing untuk data pengeluaran
Route::get('/tampil-pengeluaran', [PengeluaranController::class, 'index'])->name('tampil-pengeluaran');
Route::post('/tambah-pengeluaran', [PengeluaranController::class, 'store'])->name('tambah-pengeluaran');
Route::get('/{id}/edit-pengeluaran', [PengeluaranController::class, 'edit'])->name('edit-pengeluaran');
Route::resource('datapengeluaran', PengeluaranController::class);

// Routing untuk data pemasukan
Route::get('/tampil-pemasukan', [PengeluaranController::class, 'index'])->name('tampil-pengeluaran');
Route::post('/tambah-pengeluaran', [PengeluaranController::class, 'store'])->name('tambah-pengeluaran');
Route::get('/{id}/edit-pengeluaran', [PengeluaranController::class, 'edit'])->name('edit-pengeluaran');
Route::resource('datapengeluaran', PengeluaranController::class);


// Routing untuk halaman cek status pemesanan
Route::get('/cek-status-pemesanan', [DatapenghuniController::class, 'cekStatusPemesanan'])->name('cek-status-pemesanan');

// Routing untuk mengunggah bukti pembayaran
Route::post('/upload-payment-proof', [DatapenghuniController::class, 'uploadPaymentProof'])->name('upload-payment-proof');

Route::middleware(['auth'])->group(function () {
    Route::get('/penghuni/dashboard', [DatapenghuniController::class, 'penghuniDashboard'])->name('penghuni-dashboard');
    Route::post('/penghuni/komplain/{id}', [DatapenghuniController::class, 'komplain'])->name('penghuni-komplain');
});

Route::get('/tampil-laporan', [LaporanController::class, 'index']);
Route::post('/cetak-laporan', [LaporanController::class, 'cetak'])->name('laporan.cetak');
Route::get('/tampil-laporan', [LaporanController::class, 'index'])->name('laporan.index');

//pesan kamar
Route::get('/kamar-tersedia', [DatakamarController::class, 'kamarTersedia'])->name('kamar-tersedia');
Route::post('/pesan-kamar/{id}', [DatapenghuniController::class, 'pesanKamar'])->name('pesan-kamar');
Route::get('/detail-pemesanan/{id}', [DatapenghuniController::class, 'detailPemesanan'])->name('detail-pemesanan');

//Aprroval
Route::post('/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('approve-payment');

//laporan pemasukan
Route::get('/laporan-pemasukan', [AdminController::class, 'laporanPemasukan'])->name('laporan-pemasukan');

// Routing untuk penghuni
Route::get('/cek-pembayaran', [PenghuniController::class, 'cekPembayaran'])->name('cek-pembayaran');
Route::post('/upload-payment-proof/{id}', [PenghuniController::class, 'uploadPaymentProof'])->name('upload-payment-proof');

// Routing untuk pemilik/admin
Route::post('/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('approve-payment');
Route::get('/notifikasi', [AdminController::class, 'showNotifications'])->name('notifikasi');
Route::post('/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('approve-payment');
Route::post('/approve-payment/{id}', [AdminController::class, 'approvePayment'])->name('approve-payment');

// Routing untuk data pemasukan
Route::get('/tampil-pemasukan', [PemasukanController::class, 'index'])->name('tampil-pemasukan');
Route::post('/tambah-pemasukan', [PemasukanController::class, 'store'])->name('tambah-pemasukan');
Route::get('/{id}/edit-pemasukan', [PemasukanController::class, 'edit'])->name('edit-pemasukan');
Route::resource('datapemasukan', PemasukanController::class);

// Routing notifikasi
Route::post('/notifications/{id}/mark-as-read', [PaymentController::class, 'markAsRead'])->name('mark-as-read');




