<?php
require_once 'monster-html/connection/connect.php';
session_start();
if (!empty($_SESSION['NIP']) || isset($_SESSION['NIP'])) {
	header("location:monster-html/");
}
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<title>tubes_pw</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="monster-html/css/style.css" rel="stylesheet">
	<link href="monster-html/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
	<div class="card mx-auto mt-5" style="width: 300px;">
		<div class="card-header" style="background:blue;">
			<h2>Login</h2>
		</div>
		<?php if ($_GET['pesan'] == 'gagal') { ?>
			<h4 class="p-2 bg-danger" style="color: white;">Data yang anda masukkan belum terdaftar!</h4>
		<?php } else if ($_GET['pesan'] == 'captcha') { ?>
			<h4 class="p-2 bg-danger" style="color: white;">Maaf captcha yang anda masukkan salah!</h4>
		<?php } ?>
		<div class="body p-3">
			<form method="post" action="cek_login.php">
				<div class="form-group">
					<label for="nip">NIP</label>
					<input type="number" class="form-control" id="nip" name="nip" required>
				</div>
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="pass" required>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-5">
							<img src="captcha.php" class="img-fluid" />
						</div>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="captcha" />
						</div>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" value="Login">
			</form>
		</div>
	</div>
	<?php
	echo $_SESSION['captcha_code'];
	?>
</body>

</html>