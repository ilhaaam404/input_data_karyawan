<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM employees WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

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
    <center>
        <h3>Formulir Edit Data</h3>
    </center>
	<link rel="stylesheet" href="form.css" type="text/css">
    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $data['nama'] ?>" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat"><?php echo $data['alamat'] ?></textarea>
        </p>
        <p>
            <label for="jenis_kelamin">Jenis Kelamin: </label>
            <?php $jk = $data['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($jk == 'Laki-Laki') ? "checked": "" ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
        </p>
        <p>
            <label for="agama">Agama: </label>
            <?php $agama = $data['agama']; ?>
            <select name="agama">
                <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
            </select>
        </p>
		<p>
            <label for="jabatan">Jabatan: </label>
            <input type="text" name="jabatan" placeholder="Jabatan saat ini" value="<?php echo $data['jabatan'] ?>" />
        </p>
		<p>
		<label for="gambar">Gambar: </label>
		<?php
		echo "<p align='center'><img height=120 width=150 src='images/".$data['image']."'></p>";
        ?>
		</p>
		<p> <label for="image">Ubah gambar: </label>
			<input type="file" name="image" multiple></td>
        <p>
            <button class="button button2" type="submit" name="simpan">Simpan</button>
        </p>

        </fieldset>


    </form>

    </body>
</html>
