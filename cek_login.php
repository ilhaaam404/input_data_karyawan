<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
 foreach ($data as $row)
 $department = $row['department'];
 $level = $row['level'];
 $activity = "Login";
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['department'] = $row['department'];
	$_SESSION['level'] = $row['level'];
	$_SESSION['status'] = "login";
			
			//$array = mysql_fetch_array(mysqli_query($data));
	        //$_SESSION['username'] = $array['username'];
            //$_SESSION['password'] = $array['password'];
            //$_SESSION['department'] = $array['department'];
			//$_SESSION['level'] = $array['level'];
			
	header("location:list.php");
	$t_sql = "INSERT INTO user_login (username, department, level, activity, date) VALUES ('$username', '$department', '$level', '$activity', NOW())";
//"UPDATE admin SET date = CURRENT_TIMESTAMP WHERE username='$username'";
	$t_result = mysqli_query($koneksi,$t_sql);
	}else{
	header("location:index.php?pesan=gagal");
}

?>