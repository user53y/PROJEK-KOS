    <div class="mb-3">
        <label for="no_kamar" class="form-label">No. Kamar</label>
        <input type="text" class="form-control" id="no_kamar" name="no_kamar" placeholder="Masukkan nomor kamar" required>
    </div>
    <div class="mb-3">
        <label for="tipe" class="form-label">Tipe</label>
        <select class="form-select" id="tipe" name="tipe" required>
            <option value="">Pilih Tipe</option>
            <option value="Kamar Standard">Kamar Standard</option>
            <option value="Kamar Keluarga">Kamar Keluarga</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="luas" class="form-label">Luas</label>
        <select class="form-select" id="luas" name="luas" required>
            <option value="">Pilih Ukuran</option>
            <option value="3m x 4m">3m x 4m</option>
            <option value="3m x 5m">3m x 5m</option>
            <option value="4m x 5m">4m x 5m</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="lantai" class="form-label">Lantai</label>
        <input type="number" class="form-control" id="lantai" name="lantai" placeholder="Masukkan nomor lantai" required>
    </div>
    <div class="mb-3">
        <label for="kapasitas" class="form-label">Kapasitas</label>
        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas kamar" required>
    </div>
    <div class="mb-3">
        <label for="harga_bulanan" class="form-label">Harga Bulanan</label>
        <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="text" class="form-control" id="harga_bulanan" name="harga_bulanan" placeholder="Masukkan harga bulanan" required>
        </div>
    </div>
    <div>
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="Tersedia">Tersedia</option>
            <option value="Disewa">Disewa</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>

    <script>
        // Fungsi untuk mengatur nomor kamar
        let roomCount = 1;
        document.getElementById("no_kamar").value = `Kamar no ${roomCount}`;
        document.getElementById("addRoom").addEventListener("click", function () {
            roomCount++;
            document.getElementById("no_kamar").value = `Kamar no ${roomCount}`;
        });
    </script>
