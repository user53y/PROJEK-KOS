<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kos Bu Tik</title>
    <style>
        .bg-image {
            background: url('template/img/login.png') center/cover no-repeat;
        }
    </style>
</head>
<body class="bg-light" style="font-family: 'Poppins', sans-serif;">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-6 d-none d-md-block p-0 bg-dark bg-image">
                <div class="d-flex flex-column align-items-center justify-content-center h-100 p-4">
                    <h1 class="text-center fw-bold">
                        <span class="bg-warning px-2">Selamat Datang</span>
                        <p class="bg-warning px-2">di Kos Bu Tik</p>
                    </h1>
                </div>
            </div>
            <div class="col-md-6 bg-light">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="w-75">
                        <ul class="nav nav-pills mb-4 justify-content-center" id="auth-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-semibold" id="login-tab" data-type="login" type="button">Masuk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-semibold" id="register-tab" data-type="register" type="button">Daftar</button>
                            </li>
                        </ul>
                        <div id="auth-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Memuat konten dengan AJAX
        function loadAuthContent(type) {
            $.ajax({
                url: '/' + type,
                method: 'GET',
                success: function(response) {
                    $('#auth-content').html(response);
                },
                error: function() {
                    $('#auth-content').html('<p class="text-danger">Gagal memuat data.</p>');
                }
            });
        }

        // Muat konten login
        $(document).ready(function() {
            loadAuthContent('login');
            $('#auth-tab button').on('click', function() {
                const type = $(this).data('type');
                loadAuthContent(type);
                // Ubah tab aktif
                $('#auth-tab button').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>
</html>


