<!DOCTYPE html>
<html>
<head>
    <title>Absen Masuk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Absen Masuk</h2>
        <form method="POST" action="index.php?action=create">
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Absen Masuk</button>
        </form>
    </div>
</body>
</html>