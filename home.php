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
       <li><a class="active" href="home.php"><font face="verdana">Home</font></a></li>
       <li><a href="list.php"><font face="verdana">List</font></a></li>
       <li style="float:right"><a href="logout.php"><font face="verdana">Logout</font></a></li>
    </ul>
</div></nav>
</link>
<script
src="node_modules/jquery/dist/jquery.min.js">
</script>
<script>
$(document).ready(function(){
	$(function(){
		$("#div1").fadeIn();
		$("#div2").fadeIn(1000);
		$("#div3").fadeIn(2000);
	});
});
</script>
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
		$level = $row['level'];
	}
	?>
	<br/>
	<div id="div1" style="display:none">
	<?php echo "<p align'left'><font face='verdana'color=blue size='5pt'>
	Username : ".$_SESSION['username']."
	</font>
	</p>";
	?>
	</div>
	<div id="div2" style="display:none">
		<?php
			echo "<p align 'left'><font face='verdana' color=blue size='5pt'>
			Dept : ".$_SESSION['department']."
			</font>
			</p>";
		?>
		</div>
		<div id="div3" style="display:none">
		<?php 
			echo "<p align 'left'><font face='verdana' color=blue size='5pt'>
			User Level : ".$_SESSION['level']."
			</font>
			</p>";
		?>
		</div>
	<br/>
	
</body>
</html>