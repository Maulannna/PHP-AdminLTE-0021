<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h5 class="text-left text-success">Tambah Transaksi</h5>
    <form action="index.php?page=tambah_transaksi" method="POST">
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_plg" required>
        </div>
        <div class="mb-3">
            <label for="id_barang" class="form-label">Kd Barang</label>
            <input type="text" class="form-control" id="id_barang" name="kd_barang" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="mb-3">
            <label for="harga_total" class="form-label">Harga Total</label>
            <input type="number" class="form-control" id="harga_total" name="total_harga" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        <a href="index.php?page=transaksi" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
