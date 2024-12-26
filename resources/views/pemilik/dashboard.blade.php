@extends('layouts.utama')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="content-container p-5 rounded-4">
    <!-- Row 1: Welcome and Info -->
    <div class="row mb-4">
        <div class="col-md-7">
            <div class="card p-4 shadow-sm bg-black text-white" style="font-weight:bold; border-radius: 15px;">
                <div class="row">
                    <div class="col-md-7">
                        <h3 style="font-weight:bold;">Selamat Datang kembali, {{ auth()->user()->name ?? 'Username' }}!</h3>
                        <p>Kost anda siap untuk dikelola. Apa yang ingin {{ auth()->user()->name ?? 'Username' }} lakukan hari ini?</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('template/img/selamat.png') }}" alt="Logo" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 mx-auto">
            <div class="card p-2 shadow-sm bg-light" style="border-radius: 15px;">
                <div class="d-flex align-items-center justify-content-between border-top pt-2">
                    <div class="rounded px-3 py-1 bg-dark text-white" style="font-weight: bold;">
                        Informasi Kost
                    </div>
                </div>
                @foreach ($data_kost as $data)
                <table class=" p-2 table table-borderless table-sm mt-2 table-responsive">
                    <tbody>
                        <tr>
                            <td><strong>Nama:</strong></td>
                            <td>{{ $data->nama_kost }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat:</strong></td>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="text-end">
                                    <button class="btn btn-dark btn-edit mt-2"
                                            data-id="{{ $data->id }}"
                                            data-nama="{{ $data->nama_kost }}"
                                            data-pemilik="{{ $data->pemilik }}"
                                            data-alamat="{{ $data->alamat }}"
                                            data-jumlah="{{ $data->jumlah_kamar }}">
                                        <span>Edit</span>
                                        <i class="fi fi-rr-pencil ms-2"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>

    </div>

    <div class="row mb-4">
        @foreach ([
            ['icon' => 'bi bi-people', 'label' => 'Penghuni', 'value' => $penghuni . ' Orang'],
            ['icon' => 'fi fi-ss-bed-alt', 'label' => 'Kamar Tersedia', 'value' => $kamarTersedia . ' Kamar'],
            ['icon' => 'bi bi-house-exclamation', 'label' => 'Belum Lunas', 'value' => $belumLunas],
            ['icon' => 'bi bi-currency-dollar', 'label' => 'Total Pemasukan', 'value' => 'Rp ' . number_format($totalPemasukan, 0, ',', '.')],
        ] as $summary)
        <div class="col-md-3">
            <div class="card" style="border-radius: 15px; background-color: #ded5be;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-light bg-opacity-26 d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                            <i class="{{ $summary['icon'] }}" style="color: #c9a000; font-size: 2rem;"></i>
                        </div>
                        <div>
                            <p class="text-black mb-0 fw-bold">{{ $summary['label'] }}</p>
                            <h4 class="fw-bold mb-0">{{ $summary['value'] }}</h4>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('tampil-kamar') }}" class="btn px-3 py-1" style="background-color: #181515; color: white; border-radius: 20px; font-size: 14px;">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card shadow" style="border-radius: 15px; background-color: #e2e1dc;">
            <div class="card-body text-center">
                <h5 class="mb-1">
                    <p class="mt-2 fw-bold">Rating Kost</p>
                    @php
                        $rating = $data_kost->first()->rating ?? 0; // Nilai rating dari database
                        $rating = floor($rating); // Bulatkan ke bawah
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $rating)
                            <i class="fa fa-star text-warning"></i> <!-- Bintang Isi -->
                        @else
                            <i class="fa fa-star text-white"></i> <!-- Bintang Kosong -->
                        @endif
                    @endfor
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow p-4 " style="border-radius: 15px;">
            <h6 class="mb-3" style="font-weight: bold;">Grafik Pendapatan</h6>
            <canvas id="transactionChart" style="height: 200px;"></canvas>
        </div>
    </div>
</div>


    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Kos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('pemilik.datakos.form_edit')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-edit', function () {
            const id = $(this).data('id');

            $.get(`/datakos/${id}/edit`, function (data) {
                if (data) {
                    $('#editForm').attr('action', `/datakos/${id}`);
                    $('#editForm input[name="nama_kost"]').val(data.nama_kost);
                    $('#editForm input[name="pemilik"]').val(data.pemilik);
                    $('#editForm input[name="alamat"]').val(data.alamat);
                    $('#editForm input[name="jumlah_kamar"]').val(data.jumlah_kamar);
                    $('#editForm input[name="rating"]').val(data.rating);

                    $('#editModal').modal('show');
                } else {
                    alert('Data tidak ditemukan!');
                }
            }).fail(function () {
                alert('Terjadi kesalahan saat mengambil data.');
            });
        });

            const ctx = document.getElementById('transactionChart').getContext('2d');
            const transactionChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Transaksi (Rp)',
                        data: {!! json_encode($totalPemasukan) !!},
                        borderColor: '#FFB700',
                        backgroundColor: 'rgba(255, 183, 0, 0.3)',
                        borderWidth: 2,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#FFB700',
                        pointBorderColor: '#FFFFFF',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#eaeaea'
                            },
                            title: {
                                display: true,
                                text: 'Nominal Transaksi (Rp)',
                                font: {
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                callback: function(value, index, ticks) {
                                    if (value % 1 === 0) {
                                        return value.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });
                                    }
                                    return null; 
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>


@endsection
