<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="logo.css" type="text/css">
</head>
<script>
function myFunction() {
    alert("Welcome!");	
}
myFunction()
</script>

<body>
<div class="polaroid">
<div class="header">
 <a class="active" href="home.php">
  <center><img id="logo" src="Yazaki.png" alt="Yazaki Logo" onblur="myFunction()">
</a></div>
</div>
</link>
	<br>
	<center><h2><center>Sukses</h2>
	
	<br/>
 
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	include 'koneksi.php';
	$username = $_SESSION['username'];
	$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
	foreach ($data as $row){
		$department = $row['department'];
			
	}
	?>
 
	<h4>Selamat datang, <br><?php echo $_SESSION['username']; ?>! Department anda adalah <?php echo $row['department']; ?>, anda telah login.</h4>
	<br>Klik Logo Yazaki untuk beralih ke halaman utama
	<br/>
	<br/>
	<a href ="logout.php"><button class="button button2">LOGOUT</button></a>
	
</body>
</html>