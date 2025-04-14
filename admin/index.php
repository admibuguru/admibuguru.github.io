<?php include('../koneksi.php'); 
include('../koneksi.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Data Pegawai</title>
</head>
<body>
  <h2>Data Pegawai</h2>
  <a href="export_excel.php">📥 Export ke Excel</a>
  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>No</th><th>Nama</th><th>Email</th><th>No HP</th><th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $query = $conn->query("SELECT * FROM pegawai");
    while ($row = $query->fetch_assoc()) {
      echo "<tr>
        <td>{$no}</td>
        <td>{$row['nama_lengkap']}</td>
        <td>{$row['email']}</td>
        <td>{$row['no_hp']}</td>
        <td>
          <a href='edit.php?id={$row['id']}'>✏️ Edit</a>
        </td>
      </tr>";
      $no++;
    }
    ?>
  </table>
</body>
</html>
