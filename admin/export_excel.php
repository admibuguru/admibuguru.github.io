<?php
include('../koneksi.php');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_pegawai.xls");
?>
<table border="1">
  <tr>
    <th>No</th><th>Nama</th><th>Email</th><th>No HP</th><th>Alamat</th>
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
      <td>{$row['alamat']}</td>
    </tr>";
    $no++;
  }
  ?>
</table>
