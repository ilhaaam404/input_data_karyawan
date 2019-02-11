<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<!-- cek apakah sudah login -->
	<?php
	session_start();
	
	include 'koneksi.php';
	
	if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
		header("location:home.php");
	}
	?>

<center><div class="polaroid">
<h2><center>Login</h2>
	</div>
	<br/>
	<br/>
	<div class="polaroid">
	<form method="post" action="cek_login.php"><center>
		<table>
			<tr>
				<div class="container">
				<div class="imgcontainer">
    <img src="image/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
	<!-- cek pesan notifikasi -->
	<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<center>Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "<center>Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman tersebut";
		}
	}
	?>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" placeholder="Masukkan password"></td>
			</tr>
			</div>
			<tr>
				<td></td>
				<td></td>
				<td>
				<button class="button button2" type="submit">Masuk</button></td>
			</tr>
		</table>			
	</form>
	</div>
</body>
</html>