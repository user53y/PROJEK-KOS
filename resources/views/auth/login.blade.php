<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="login-email" class="form-label fw-semibold">Email</label>
        <input type="email" class="form-control" id="login-email" name="email" placeholder="Masukkan email" required >
    </div>
    <div class="mb-3">
        <label for="login-password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control" id="login-password" name="password"  placeholder="Masukkan password" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
        <label class="form-check-label fw-semibold" for="remember-me">Ingat saya</label>
    </div>
    <button type="submit" class="btn btn-warning w-100 fw-semibold">Masuk</button>
    <p class="text-center mt-3">
        <a href="{{ route('password.request') }}" class="text-warning text-decoration-none">Lupa password?</a>
    </p>
</form>


