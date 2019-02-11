<?php

include("koneksi.php");
session_start();
if( !isset($_GET['id']) ){
	header('location: list.php');
}

$id = $_GET['id'];
$_SESSION['id'] = $id;
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
        <h3>Form Upload File</h3>
    </center>
	<link rel="stylesheet" href="form.css" type="text/css">
	<fieldset>
		<form action="proses-upload.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="upload[]" multiple>
			<br>
			<button class="button button2 type="submit" name="simpan">Simpan</button>
			</fieldset>
			</link>
			</form>
			</body>
			</html>