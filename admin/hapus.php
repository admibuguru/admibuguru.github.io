<?php
include('../koneksi.php');
include('session.php');
$id = $_GET['id'];

// Hapus file upload jika ada
$data = $conn->query("SELECT file_identitas, file_ijazah, foto_profil FROM pegawai WHERE id=$id")->fetch_assoc();
@unlink("../uploads/identitas/" . $data['file_identitas']);
@unlink("../uploads/ijazah/" . $data['file_ijazah']);
@unlink("../uploads/foto/" . $data['foto_profil']);

// Hapus dari database
$conn->query("DELETE FROM pegawai WHERE id=$id");
header("Location: index.php");
