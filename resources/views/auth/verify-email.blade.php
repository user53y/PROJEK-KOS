@extends('layouts.master')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 28rem;">
        <div class="card-body">
            <h5 class="card-title text-center fw-bold">Verifikasi Email</h5>
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    Link verifikasi telah dikirim ke alamat email Anda.
                </div>
            @endif
            <p class="card-text text-center text-muted">
                Tolong verifikasi akun Anda dengan mengirimkan link verifikasi ke alamat email: {{ auth()->user()->email }}
            </p>
            <a class="btn btn-primary" href="{{ route('verification.send') }}"
                onclick="event.preventDefault(); document.getElementById('verify-form').submit()">
                <i class="fa-solid fa-envelope"></i>
                <span> Kirim Link Verifikasi</span>
            </a>
            <form action="{{ route('verification.send') }}" method="post" style="display: none;" id="verify-form">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
