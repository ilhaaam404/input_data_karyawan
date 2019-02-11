<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
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
	//tempat menyimpan foto
	move_uploaded_file($tmp, $path);
    // buat query update
    $sql = "UPDATE employees SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', jabatan='$jabatan', image='$newimage' WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil?
    if($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location:list.php?pesan=berhasiledit');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
