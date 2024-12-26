<div class="mb-3">
    <label for="penghuni_id" class="form-label">Nama Penghuni</label>
    <select class="form-select" id="penghuni_id" name="penghuni_id" required>
        <option value="">Pilih Penghuni</option>
        @foreach($penghuni as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="kamar_id" class="form-label">Kamar</label>
    <select class="form-select" id="kamar_id" name="kamar_id" required>
        <option value="">Pilih Kamar</option>
        @foreach($kamar as $item)
            <option value="{{ $item->id }}">{{ $item->nama_kamar }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="jumlah" class="form-label">Jumlah Pemasukan</label>
    <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah pemasukan" required>
    </div>
</div>
<div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal Pemasukan</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
</div>
