
        <div class="d-flex justify-content-center mb-3">
            <img src="/images/${data.gambar}" alt="Gambar Kamar" class="img-fluid rounded" />
        </div>
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><strong>No. Kamar:</strong></td>
                        <td>${data.no_kamar}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipe:</strong></td>
                        <td>${data.tipe}</td>
                    </tr>
                    <tr>
                        <td><strong>Luas:</strong></td>
                        <td>${data.luas}</td>
                    </tr>
                    <tr>
                        <td><strong>Lantai:</strong></td>
                        <td>${data.lantai}</td>
                    </tr>
                    <tr>
                        <td><strong>Kapasitas:</strong></td>
                        <td>${data.kapasitas} orang</td>
                    </tr>
                    <tr>
                        <td><strong>Harga Bulanan:</strong></td>
                        <td class="text-success">Rp. ${new Intl.NumberFormat('id-ID').format(data.harga_bulanan)}</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td><span class="badge bg-${data.status === 'Tersedia' ? 'success' : 'danger'}">${data.status}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
