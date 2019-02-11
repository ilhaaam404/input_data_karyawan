<?php
	include "koneksi.php";
	session_start();
	$id = $_SESSION['id'];
	if (isset($_POST["kirim"])) {
		$jumlah = count($_FILES['upload']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['upload']['name'][$i];
				$tmp_name = $_FILES['upload']['tmp_name'][$i];
				$newfile = date('dmYHis').$file_name;
				$path = "images/".$newfile;
				move_uploaded_file($tmp_name, $path);
				mysqli_query($koneksi,"INSERT INTO upload (id_file, id_employees, file) VALUES ('',$id,'$newfile')");				
			}
			echo "Berhasil Upload";
		}
		else{
			echo "Gambar tidak ada";
		}
	}
?>