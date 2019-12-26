<?php
//koneksi
require_once "monster-html/connection/connect.php";
// mengaktifkan session php
session_start();

// menangkap data yang dikirim dari form
$NIP = $_POST['nip'];
$password = $_POST['pass'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn, "SELECT * FROM user_login WHERE nip='$NIP' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	if ($_POST['captcha'] == $_SESSION["captcha_code"]) {
		$pegawai = mysqli_query($conn, "SELECT * FROM struktur WHERE nip='$NIP'");
		$dataP = mysqli_fetch_assoc($pegawai);
		if ($dataP['jabatan'] == "Admin") {
			$_SESSION['NIP'] = $NIP;
			$_SESSION['nama'] = $dataP['nama'];
			echo "<script>alert('Selamat Datang, $dataP[nama]!')";
			header('refresh:0,html/', true, 303);
		} else {
			$_SESSION['NIP'] = $NIP;
			$_SESSION['nama'] = $dataP['nama'];
			echo "<script>alert('Selamat Datang, $dataP[nama]!')";
			header('refresh:0,monster-html/', true, 303);
		}
	} else {
		header("location:index.php?pesan=captcha");
	}
} else {
	header("location:index.php?pesan=gagal");
}
