<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="signup-name" class="form-label fw-semibold">Nama</label>
        <input type="text" class="form-control" id="signup-name" name="name" placeholder="Masukkan Nama Lengkap" required>
    </div>
    <div class="mb-3">
        <label for="signup-email" class="form-label fw-semibold">Email</label>
        <input type="email" class="form-control" id="signup-email" name="email" placeholder="Masukkan Email" required>
    </div>
    <div class="mb-3">
        <label for="signup-password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control" id="signup-password" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="mb-3">
        <label for="signup-password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" class="form-control" id="signup-password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password" required>
    </div>
    <div class="mb-3">
        <label for="signup-role" class="form-label fw-semibold">Role</label>
        <select class="form-control" id="signup-role" name="role" required>
            <option value="">Pilih Role</option>
            <option value="penghuni">Penghuni</option>
            <option value="pemilik">Pemilik</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning w-100 fw-semibold">Daftar</button>
</form>
