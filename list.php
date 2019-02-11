<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	include("koneksi.php");
	?>
	<script>
function Berhasil() {
    alert("Data Berhasil di Simpan.");
}
function BerhasilApp() {
	alert("Data Berhasil di Approve.");
}
function BerhasilHapus() {
	alert("Data Berhasil di Hapus.");
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jQuery Custom Scroller</title>
    <link href="list.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/js/custom-scroller.js"></script>
	
    <script type="text/javascript">
        $(document).ready( function() {
			$(function(){
				$("#div1").fadeIn();
				$("#div2").fadeIn(1000);
				$("#div3").fadeIn(2000);
	});
            $('.menu').customScroller({
                'scrollSpeed' : 800
            });
        });
    </script>
</head>
<body>
    <div class="">
      <div class="menu" >
          <div class="inner">
            <div class="polaroid">
    <ul>
       <li class="btn-navigation" data-route="home"><font face="verdana">Home</font></li>
       <li class="btn-navigation" data-route="sec-A"><font face="verdana">List</font></li>
       <li style="float:right"><a href="logout.php"><font face="verdana">Logout</font></a></li>
    </ul>
          </div>
		  </div>
      </div>
      <div class="section home">
      </div>
	</div>
<body>
<div class="polaroid">
<div class="header">
 <a class="active" href="#Dashboard">
  <center><img id="logo" src="Yazaki.png" alt="Yazaki Logo">
</a>
</div>
</div>
</br>
</br>
<form>
<table>
	<tr>
	<div class="container">
	<div class="imgcontainer">
<img src="image/img_avatar2.png" alt="Avatar" class="avatar">
</div>
	<!-- cek apakah sudah login -->
	<?php 
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
	<?php 
	echo "<p align'left'><font face='verdana'color=blue size='5pt'>
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
		</tr>
		</table>
		</form>
		</div>
	<br/>
<br/>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<div class="section sec-A">
          <h1><font face="verdana">List Input Data</font></h1>
      </div>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!---css button anim--->


			<nav>
				<a href="form-daftar.php"><button class="button"><span>Tambah Baru</span></button></a>
			</nav>
			<br>
			<link rel="stylesheet" href="table.css" type="text/css">
			<table border="1">
			<thead>
				<tr>
					<th><p class="a">No</p></th>
					<th><p class="a">Nama</p></th>
					<th><p class="a">Alamat</p></th>
					<th><p class="a">Jenis Kelamin</p></th>
					<th><p class="a">Agama</p></th>
					<th><p class="a">Jabatan</p></th>
					<th><p class="a">Opsi</p></th>
					<?php if (isset($_SESSION['level']))
					{
						//jika level admin
						if ($_SESSION['level'] == "Administrator")
						{
						echo "<th>Status</th>";
						}
						{
						}
					}
						?>
				</tr>
			</thead>
			<tbody>
			
				<?php
				$sql = "SELECT * FROM employees";
				$query = mysqli_query($koneksi, $sql);
				
				while($list = mysqli_fetch_array($query)){
					echo "<tr>";
					
					echo "<td>".$list['id']."</td>";
					echo "<td>";
					echo "<a href='info.php?nama=".$list['nama']."'><button class='buttonnama button5'><span>".$list['nama']."</span></button></a>";
					echo "</td>";
					echo "<td>".$list['alamat']."</td>";
					echo "<td>".$list['jenis_kelamin']."</td>";
					echo "<td>".$list['agama']."</td>";
					echo "<td>".$list['jabatan']."</td>";
					
					echo "<td>";
					echo "<a href='form-edit.php?id=".$list['id']."'><button class='buttonedit button5'><span>Edit</span></button></a>";
					echo "<a href='hapus.php?id=".$list['id']."'><button class='buttonhapus button5'><span>Hapus</span></button></a>";
					echo "<a href='upload.php?id=".$list['id']."'><button class='buttonupload button5'><span>Upload</span></button></a>";
					if (isset($_SESSION['level']))
					{
						//jika level admin
						if ($_SESSION['level'] == "Administrator")
						{
							
							echo "<a href='proses-approve.php?id=".$list['id']."'><button class='buttonapp'><span>Approve</span></button></a>";
							
							echo "<td>";
							if ($list['approve'] == "ok")
								echo "<center><button class='button2 ok'>OK</button></center>";
							else if ($list['approve'] != "ok")
								echo "<center><button class='button3 no'>Pending</button></center";
							
							
						}
						
						//jika kondisi level staff maka akan diarahkan ke
						else if ($_SESSION['level'] != "Administrator")
							
							{
							}
					}
					
					echo "</td>";
					echo "</tr>";
					
				}
				?>
				
					
			</tbody>
			</table>
			<!-- cek pesan notifikasi -->
	<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<center>Data gagal disimpan! Masukan username, password dan gambar dengan benar!";
		}else if($_GET['pesan'] == "sukses"){
			echo "<script>Berhasil();</script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman tersebut";
		}else if($_GET['pesan'] == "berhasilapprove"){
			echo "<script>BerhasilApp()</script>";
		}else if($_GET['pesan'] == "berhasiledit"){
			echo "<script>Berhasil()</script>";
		}else if($_GET['pesan'] == "berhasilhapus"){
			echo "<script>BerhasilHapus()</script>";
		}
	}
	?>
			
			<p>Total data : <?php echo mysqli_num_rows($query) ?></p>
			</body>
		</html>