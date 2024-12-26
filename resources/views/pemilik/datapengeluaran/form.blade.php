<div class="mb-3">
    <label for="jenis_id" class="form-label">Jenis Pengeluaran</label>
    <select class="form-select" id="jenis_id" name="jenis_id" required>
        <option value="">Pilih Jenis Pengeluaran</option>
        @foreach($jenisPengeluaran as $jenis)
            <option value="{{ $jenis->id }}">{{ $jenis->nama_pengeluaran }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="deskripsi_pengeluaran" class="form-label">Deskripsi Pengeluaran</label>
    <input type="text" class="form-control" id="deskripsi_pengeluaran" name="deskripsi_pengeluaran" placeholder="Masukkan deskripsi pengeluaran" required>
</div>
<div class="mb-3">
    <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
    <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran" placeholder="Masukkan jumlah pengeluaran" required>
    </div>
</div>
<div class="mb-3">
    <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
    <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
</div>
