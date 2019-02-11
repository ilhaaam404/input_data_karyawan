<?php 
include("koneksi.php");
session_start();
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$level = $_SESSION['level'];
$approve = $_SESSION['approve'];
if( !isset($_GET['id']) ){
    header('Location:list.php');
}

//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM employees WHERE id=$id";
	$query = mysqli_query($koneksi, $sql);
	foreach ($query as $row)
	$nama = $row['nama'];
	$_SESSION['approve'] = $row['approve'];
	if ($_SESSION['approve'] != "ok") {
	$approve = "ok";
	$activity = "Approved";
	
	if( mysqli_num_rows($query) > 0 ){
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['approve'] = $approve;
		echo $nama;
		echo $username;
		
		// refresh halaman
	$t_sql = "INSERT INTO approve_log (nama, approve_by, approve_date) VALUES ('$nama', '$username', NOW())";
		$t_result = mysqli_query($koneksi, $t_sql);
	$a_sql = "UPDATE employees set approve='$approve' WHERE id=$id";
		$a_result = mysqli_query($koneksi, $a_sql);
	$u_sql = "INSERT INTO user_login (username, department, level, activity, date) VALUES ('$username', '$department', '$level', '$activity', NOW())";
		$u_result = mysqli_query($koneksi,$u_sql);
		
		header("location:list.php?pesan=berhasilapprove");
	}else{
		header("location:list.php?pesan=gagalapprove");
}
	}else{
		header("location:list.php?pesan=sudahapprove");
	}

?>