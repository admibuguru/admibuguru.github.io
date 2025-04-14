<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "data_pegawai";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama       = $_POST['nama_lengkap'];
$tempat     = $_POST['tempat_lahir'];
$tanggal    = $_POST['tanggal_lahir'];
$alamat     = $_POST['alamat'];
$no_hp      = $_POST['no_hp'];
$email      = $_POST['email'];
$jenis_id   = $_POST['jenis_identitas'];
$ortu       = $_POST['nama_orang_tua'];
$pengalaman = $_POST['pengalaman_kerja'];

// Proses upload file identitas
$identitas_file = $_FILES['upload_identitas']['name'];
$identitas_tmp  = $_FILES['upload_identitas']['tmp_name'];
$identitas_path = "uploads/identitas/" . $identitas_file;
move_uploaded_file($identitas_tmp, $identitas_path);

// Proses upload ijazah
$ijazah_file = $_FILES['upload_ijazah']['name'];
$ijazah_tmp  = $_FILES['upload_ijazah']['tmp_name'];
$ijazah_path = "uploads/ijazah/" . $ijazah_file;
move_uploaded_file($ijazah_tmp, $ijazah_path);

// Simpan ke database
$sql = "INSERT INTO pegawai (nama_lengkap, tempat_lahir, tanggal_lahir, alamat, no_hp, email, jenis_identitas, file_identitas, nama_orang_tua, pengalaman_kerja, file_ijazah)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssss", $nama, $tempat, $tanggal, $alamat, $no_hp, $email, $jenis_id, $identitas_file, $ortu, $pengalaman, $ijazah_file);

if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Gagal menyimpan data: " . $conn->error;
}

$conn->close();
?>
