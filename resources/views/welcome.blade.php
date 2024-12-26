@extends('layouts.master')
@section('content')
    <link href=template/css/landdingpage.css rel="stylesheet">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <div>
                StayKos.Id
                <h6 class="mb-0 text-muted" style="font-size: 12px;">Sistem Manajemen Kos</h6>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('auth')}}" class="btn btn-dark ms-3">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten -->
<div id="home" class="content-container p-5" style="border-radius: 0; ">
    <div class="row align-items-center text-center text-md-start" style="margin-left: 2rem; margin-top: 5rem;">
        <div class="col-md-6">
            <h1 class="fw-bold fs-2">Rumah Kos Bu Tik</h1>
            <p class="mt-3 fs-5">Selamat Datang di Kos Bu Tik, Jika anda belum memiliki akun, silahkan daftar sekarang!</p>
            <p class="mt-3 fs-5">Kost yang nyaman, aman, bersih, dan modern. Fasilitas oke harga bersahabat. Terletak di daerah yang strategis.</p>
            <a href="{{ route('auth') }}" class="btn btn-warning btn-lg mt-4 fw-bold text-dark">Mulai Sekarang</a>
        </div>
        <div class="col-md-6 img-container position-relative">
            <img src="{{ asset('template/img/kos.png') }}" alt="Logo" class="img-fluid">
        </div>
    </div>
</div>

<div class="content-container">
    <!-- About Section -->
    <section id="tentang" class="about-section">
        <div class="container">
            <h2 class="text-center mb-6 fw-bold "  >Tentang Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="about-card">
                        <h3>Lokasi Strategis</h3>
                        <p>Terletak di pusat kota dengan akses mudah ke kampus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-card">
                        <h3>Lingkungan Aman</h3>
                        <p>Dilengkapi dengan sistem keamanan 24 jam dan CCTV.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-card">
                        <h3>Fasilitas Lengkap</h3>
                        <p>Dilengkapi dengan fasilitas lengkap seperti kamar mandi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-item">
                <h5>Kontak Kami</h5>
                <p>Alamat: Jl. Margo Tani, Sukorame, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114 </p>
                <p>No. Telp: <a href="tel: +62858-1532-0313">+62 858-1532-0313</a></p>
                <p>Email: <a href="mailto:info@staykos.id">info@staykos.id</a></p>
                <p>WhatsApp: <a href="https://api.whatsapp.com/send?phone=+6285815320313&text=Halo%20Kos%20Bu%20Tik!" target="_blank">+62 858-1532-0313</a></p>
            </div>
            <div class="footer-item">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <div class="text fw-bold mt-4">
        <p>&copy; 2024 Dibuat oleh Andara, Diana, Marinda, Reny - Manajemen Informatika</p>
    </div>
</footer>

<script>
    // Navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        const navLinks = document.querySelectorAll('.nav-link');

        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        const sections = document.querySelectorAll('section');
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop - 60) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').slice(1) === current) {
                link.classList.add('active');
            }
        });
    });

    // Map kos bu tik
    const map = L.map('map').setView([-7.8041774, 111.9799067], 16);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const marker = L.marker([-7.8058928, 111.98148]).addTo(map)
        .bindPopup('<b>Kos Bu Tik</b><br>Kos Nyaman').openPopup();
</script>
@endsection
