@extends('layouts.penghuni')

@section('content')
@section('title', 'Kamar Tersedia')

<div class="container1 p-4">
    <h2 class="fw-bold mb-0  text-white">Kamar Tersedia</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($kamarTersedia->isEmpty())
        <p>Tidak ada kamar yang tersedia saat ini.</p>
    @else
        <div class="row">
            @foreach ($kamarTersedia as $kamar)
                <div class="col-md-4 mb-4 p-3">
                    <div class="card shadow" style="border-radius: 15px; background-color: #ffffff;">
                        <img src="{{ asset('images/' . $kamar->gambar) }}" class="card-img-top" alt="Gambar Kamar" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $kamar->no_kamar }}</strong></h5>
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td><strong>Tipe:</strong></td>
                                    <td>{{ $kamar->tipe }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Lantai:</strong></td>
                                    <td>{{ $kamar->lantai }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Luas:</strong></td>
                                    <td>{{ $kamar->luas }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Harga:</strong></td>
                                    <td>Rp {{ number_format($kamar->harga_bulanan, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                            <form action="{{ route('pesan-kamar', $kamar->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success" style="float: right;">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
