<div class="mb-3">
    <label for="user_id" class="form-label">Nama Penghuni</label>
    <select class="form-select" id="user_id" name="user_id" required>
        <option value="">Pilih Penghuni</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="datakamar_id" class="form-label">No. Kamar</label>
    <select class="form-select" id="datakamar_id" name="datakamar_id" required>
        <option value="">Pilih Kamar</option>
        @foreach($kamar as $room)
            <option value="{{ $room->id }}">{{ $room->no_kamar }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ now()->format('Y-m-d') }}" readonly >
</div>
<div class="mb-3">
    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"  value="{{ now()->addDays(30)->format('Y-m-d') }}" readonly>
</div>
<div class="mb-3">
    <label for="no_telp" class="form-label">No. Telp</label>
    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no telepon" required>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" id="status" name="status" required>
        <option value="">Pilih Status</option>
        <option value="Lunas">Lunas</option>
        <option value="Belum Lunas">Belum Lunas</option>
    </select>
</div>
<div class="mb-3">
    <label for="foto_ktp" class="form-label">Foto KTP</label>
    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
</div>
<script>
</script>
