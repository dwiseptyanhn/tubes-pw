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
				<input type="submit" class="btn btn-primary" value="Login">
		</form>
		</div>
	</div>
</body>
</html>