<!DOCTYPE html>
<html>
<head>
    <title>Daftar Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Absensi</h2>
        <a href="index.php?action=create" class="btn btn-primary mb-3">Absen Masuk</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['nama_karyawan']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['waktu_masuk']; ?></td>
                    <td><?php echo $row['waktu_keluar']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if(empty($row['waktu_keluar'])) { ?>
                        <form method="POST" action="index.php?action=checkout" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Checkout</button>
                        </form>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>