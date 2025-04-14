<?php
include('../koneksi.php');
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM pegawai WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Data</title>
</head>
<body>
  <h2>Edit Data Pegawai</h2>
  <form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    Nama: <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>"><br>
    No HP: <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>"><br>
    <button type="submit">Simpan</button>
  </form>

  <form action="update.php" method="POST" enctype="multipart/form-data">
  ...
  Upload Foto Profil:
  <input type="file" name="foto_profil" accept="image/*"><br>
</form>

</body>
</html>
