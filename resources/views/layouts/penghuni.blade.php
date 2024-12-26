<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href=template/css/sidebar.css rel="stylesheet">
    <link href=template/css/logo.css rel="stylesheet">
    <link href=template/css/logo1.css rel="stylesheet">
    <link href=template/css/dashboard.css rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div id="sidebar" class="left-sidebar">
            <div class="brand-logo" >
                <i class="fi fi-br-house"></i>
                <div>
                    <h4 class="mb-0" style="font-weight: bold; font-size: 20px;">StayKost.Id</h4>
                    <span style="font-size: 12px">Sistem Manajemen Kos</span>
                </div>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <a href= "{{ url('kamar-tersedia')}}" class="sidebar-link">
                        <i class="fi fi-br-layout-fluid"></i>
                        <span>Pesan Kamar</span>
                    </a>
                    <a href="{{url('cek-pembayaran')}}" class="sidebar-link">
                        <i class="fi fi-br-bed-bunk"></i>
                        <span>Cek Pembayaran</span>
                    </a>

                    <a href="{{ route('logout') }}" class="sidebar-link" style="cursor:pointer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fi fi-br-exit"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>
            </div>
        </div>

        <div class="main-content" id="mainContent">
            <nav class="navbar fixed-top" >
                <div class="container-fluid navbar-content">
                    <div class="d-flex align-items-center gap-2">
                        <button id="toggleButton" class="btn" style="border-radius: 50%;">
                            <i class="fi fi-br-bars-staggered"></i>
                        </button>
                        <div style="padding-left: 10px">
                            <h3 id="page-title" class="mb-0 ms-2">Dashboard</h3>
                            <div class="text-muted small" id="current-date" style="padding-left: 10px"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">


                        <div class="profile bg-orange-100 rounded-pill shadow-sm px-3 py-1 d-flex align-items-center">
                            <img src="{{ asset('template/img/penghuni1.png') }}" alt="Profile Picture" class="rounded-circle shadow" style="width: 50px; height: 40px;">
                            <div class="ms-2">
                                <div class="fw-bold">{{ auth()->user()->name ?? 'Username' }}</div>
                                <div class="text-muted small">{{ auth()->user()->role ?? 'Role' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="  py-3 bg-light">
        <div class="footer-content">
            <div class="text-center ">
                <p class="mb-0">&copy; 2024 Dibuat oleh Andara, Diana, Marinda, Reny - Manajemen Informatika</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="template/js/tanggal.js"></script>
    <script src="template/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
