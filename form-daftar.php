<?php
session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	include("koneksi.php");
	?>
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
       <li><a href="list.php"><font face="verdana">Home</font></a></li>
       <li style="float:right"><a href="logout.php"><font face="verdana">Logout</font></a></li>
    </ul>
</div></nav>
</link>
	
	<br>
    
        <center><h3>Form Input Data Karyawan</h3></center>
<link rel="stylesheet" href="form.css" type="text/css">
    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">

        <fieldset>

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="Nama Lengkap" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat" placeholder="Alamat"></textarea>
        </p>
        <p>
            <label for="jenis_kelamin">Jenis Kelamin: </label>
            <label><input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
        </p>
        <p>
            <label for="agama">Agama: </label>
            <select name="agama">
                <option>Islam</option>
                <option>Kristen</option>
                <option>Hindu</option>
                <option>Budha</option>
                <option>Atheis</option>
            </select>
        </p>
        <p>
            <label for="jabatan">Jabatan: </label>
            <input type="text" name="jabatan" placeholder="Jabatan Saat Ini" />
        </p>
		<p> <label for="foto">Pilih Gambar: </label>
			<input type="file" name="image"></td>
        <p>
            <button class="button button2" type="submit" name="daftar">Daftar</button>
        </p>

        </fieldset>

    </form>
	</link>

    </body>
</html>
