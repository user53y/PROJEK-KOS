<div class="d-flex justify-content-center mb-3">
    <img src="/images/${data.foto_ktp}" alt="Foto KTP" class="img-fluid rounded" />
</div>
<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td><strong>Nama Penghuni:</strong></td>
                <td>${data.name}</td>
            </tr>
            <tr>
                <td><strong>No. Kamar:</strong></td>
                <td>${data.datakamar.no_kamar}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Masuk:</strong></td>
                <td>${data.tanggal_masuk}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Keluar:</strong></td>
                <td>${data.tanggal_keluar}</td>
            </tr>
            <tr>
                <td><strong>Status:</strong></td>
                <td>${data.status}</td>
            </tr>
        </tbody>
    </table>
</div>


