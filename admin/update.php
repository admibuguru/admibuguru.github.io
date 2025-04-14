<?php
include('../koneksi.php');
$id     = $_POST['id'];
$nama   = $_POST['nama_lengkap'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];

// Upload foto profil jika ada
$foto_file = $_FILES['foto_profil']['name'];
if ($foto_file != '') {
  $foto_tmp  = $_FILES['foto_profil']['tmp_name'];
  $foto_path = "../uploads/foto/" . $foto_file;
  move_uploaded_file($foto_tmp, $foto_path);
  $conn->query("UPDATE pegawai SET foto_profil='$foto_file' WHERE id=$id");
}

$conn->query("UPDATE pegawai SET nama_lengkap='$nama', email='$email', no_hp='$no_hp' WHERE id=$id");
header("Location: index.php");
