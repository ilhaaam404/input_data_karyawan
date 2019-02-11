<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="logo.css" type="text/css">
</head>

<body>
<div class="polaroid">
<div class="header">
 <a class="active" href="#Dashboard">
  <img id="logo" src="Yazaki.png" alt="Yazaki Logo">
</a></div>
</div>

<nav><div class="polaroid">
    <ul>
       <li><a href="list.php">Home</a></li>
       <li style="float:right"><a href="logout.php">Logout</a></li>
    </ul>
</div></nav>
</link>
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	include 'koneksi.php';
	//fungsi tidak ada nama
	if( !isset($_GET['nama']) ){
	header('location:list.php');
	}
	
	//ambil id dari query string
	$nama = $_GET['nama'];
	
	//buat query untuk ambil data dari database
	$sql = "SELECT * FROM employees WHERE nama='$nama'";
	$query = mysqli_query($koneksi, $sql);
	foreach ($query as $row)
	$nama = $row['nama'];
	$image = $row['image'];
	
	//jika data yang di-edit tidak ditemukan
	if( mysqli_num_rows($query) < 0 ){
		echo("data tidak ditemukan...");
	}
	echo "<p align='center'> <font color=blue  size='5pt'>".$row['nama']."</font><br></p>";
	echo "<p align='center'><img height=320 width=400 src='images/".$row['image']."'></p>";
	?>
	
</body>
</html>