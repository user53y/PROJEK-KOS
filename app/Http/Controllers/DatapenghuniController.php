<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DataPenghuni;
use App\Models\DataKamar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\PenghuniExport;
use Maatwebsite\Excel\Facades\Excel;

class DatapenghuniController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'penghuni')->get();
        $kamar = DataKamar::where('status', '!=', 'disewa')->get();
        $penghuni = DataPenghuni::with(['user', 'datakamar'])->get();
        return view('pemilik.datapenghuni.index', compact( 'penghuni', 'users', 'kamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'datakamar_id' => 'required|exists:datakamar,id',
            'no_telp' => 'required|string|max:15',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $image = $request->file('foto_ktp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['foto_ktp'] = $imageName;
        }

        $validated['tanggal_masuk'] = Carbon::now();
        $validated['tanggal_keluar'] = Carbon::now()->addDays(30);

        $penghuni = DataPenghuni::create($validated);

        // Dapatkan kamar yang terkait
        $kamar = DataKamar::find($penghuni->datakamar_id);

        if ($penghuni->status === 'Lunas' && $kamar) {
            $kamar->update(['status' => 'Disewa']);
        } elseif ($penghuni->status === 'Belum Lunas' && $kamar) {
            $kamar->update(['status' => 'Tersedia']);
        }

        return redirect()->route('tampil-penghuni')->with('success', 'Data Penghuni berhasil ditambahkan');
    }


    public function show($id)
    {
        $penghuni = DataPenghuni::with(['user', 'datakamar'])->findOrFail($id);
        return response()->json($penghuni);
    }

    public function destroy($id)
    {
        $penghuni = DataPenghuni::findOrFail($id);
        $kamar = DataKamar::find($penghuni->datakamar_id);

        if ($kamar) {
            $kamar->update(['status' => 'Tersedia']);
        }

        $penghuni->delete();
        return redirect()->route('tampil-penghuni')->with('success', 'Data penghuni berhasil dihapus');
    }

    public function cekStatusPemesanan()
    {
        $penghuni = DataPenghuni::with(['user', 'datakamar'])
            ->where('user_id', auth()->id())
            ->first();

        return view('penghuni.status', compact('penghuni'));
    }


    public function penghuniDashboard()
    {
        $penghuni = DataPenghuni::with(['user', 'datakamar'])
            ->where('user_id', auth()->id())
            ->first();

        return view('penghuni.dashboard', compact('penghuni'));
    }

    public function pembayaran(Request $request, $id)
    {
        $kamar = Datakamar::findOrFail($id);

        if (!$kamar || $kamar->penghuni_id !== auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'Kamar tidak valid atau tidak terhubung dengan akun Anda']);
        }

        $validated = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/pembayaran'), $imageName);
            $kamar->bukti_pembayaran = $imageName;
            $kamar->save();
        }

        return redirect()->route('penghuni-dashboard')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }


    public function pesanKamar($id)
    {
        $kamar = DataKamar::findOrFail($id);

        if ($kamar->status !== 'Tersedia') {
            return redirect()->back()->withErrors(['error' => 'Kamar tidak tersedia untuk dipesan']);
        }

        // Buat data penghuni baru
        $penghuni = DataPenghuni::create([
            'user_id' => auth()->id(),
            'datakamar_id' => $kamar->id,
            'no_telp' => 'Nomor telepon placeholder',
            'status' => 'Belum Lunas',
            'tanggal_masuk' => now(),
            'tanggal_keluar' => now()->addMonth(),
        ]);

        $kamar->update(['status' => 'Dipesan']);

        $this->kirimNotifikasiAdmin($penghuni);

        return redirect()->route('detail-pemesanan', $penghuni->id)->with('success', 'Kamar berhasil dipesan. Berikut adalah detail pemesanan Anda.');
    }

    protected function kirimNotifikasiAdmin($penghuni)
    {
        $admins = User::where('role', 'pemilik')->get();

        foreach ($admins as $admin) {
            $admin->notify(new \App\Notifications\PesananBaruNotification($penghuni));
        }
    }

    public function detailPemesanan($id)
    {
        $penghuni = DataPenghuni::with(['user', 'datakamar'])->findOrFail($id);

        if ($penghuni->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke detail pemesanan ini.');
        }

        return view('penghuni.detail_pemesanan', compact('penghuni'));
    }

    public function excel()
    {
        return Excel::download(new PenghuniExport, 'Datapenghuni.xlsx');
    }

    public function pdf(){
        $data = Datapenghuni::all();
        return view('pemilik.datapenghuni.pdf', ['datapenghuni' => $data ]);
    }






}
