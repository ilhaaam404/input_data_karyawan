<?php

include("koneksi.php");
session_start();
$username = $_SESSION['username'];

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $jabatan = $_POST['jabatan'];
	$image = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	
	//rename nama foto dengan mengambahkan tanggal dan jam upload
	$newimage = date('dmYHis').$image;
	
	//set path folder tempat menyimpan foto
	$path = "images/".$newimage;

	//proses upload
	if(move_uploaded_file($tmp, $path)){
    // buat query
    $sql = "INSERT INTO employees (nama, alamat, jenis_kelamin, agama, jabatan, image) VALUE ('$nama', '$alamat', '$jk', '$agama', '$jabatan', '$newimage')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
		$data = mysqli_query($koneksi, "select * from admin where username='$username'");
		foreach ($data as $row)
		$department = $row['department'];
		$level = $row['level'];
		$activity = "Input data";
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header("location:list.php?pesan=sukses");
		$t_sql = "INSERT INTO user_login (username, department, level, activity, date) VALUES ('$username', '$department', '$level', '$activity', NOW())";
		$t_result = mysqli_query($koneksi,$t_sql);
	} else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
	}


} else {
    //die("Akses dilarang...");
	echo "<p align='Left'> <font color=blue  size='6pt'>Username : ".$_SESSION['username']."</font></p>";
	}

?>
