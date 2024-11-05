
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Barang</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>ID Pelanggan</label>
                <input type="text" class="form-control" name="id_plg" value="<?php echo $Pelanggan['id_plg']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama_plg" value="<?php echo $Pelanggan['nama_plg']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $Pelanggan['alamat']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
