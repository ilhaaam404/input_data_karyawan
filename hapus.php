<?php

include("koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query 
    $sql2 = "SELECT * FROM employees WHERE id=$id";
	$query2 = mysqli_query($koneksi, $sql2);
	$data = mysqli_fetch_array($query2);
	$image = $data['image'];
	$id = $data['id'];
	// cek apakah file fotonya ada di folder images
	
	
	if (unlink ("images/".$image)) {
		$del1 = "DELETE FROM employees WHERE id='$id'";
		$del2 = "DELETE FROM upload where id_employees='$id'";
		$querydel1 = mysqli_query($koneksi, $del1);
		$querydel2 = mysqli_query($koneksi, $del2);
		header ("location:list.php?pesan=berhasilhapus");
		
    } else {
        echo("gagal menghapus...");
    }
	//unlink("$image"); // hapus foto yg telah di upload ke folder images
        

} else {
    echo("akses dilarang...");
}

?>
