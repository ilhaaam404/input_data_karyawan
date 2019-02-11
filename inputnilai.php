<?php

$alas = $_POST['alas'];
$lebar = $_POST['lebar'];

class kalkulator {
	function jumlah($a,$b){
		$hasil = $a + $b;
		echo $hasil;
		}
		function kali($a,$b){
			$hasil = $a * $b;
			echo $hasil;
		}
	}
	class persegipanjang extends kalkulator {
		function keliling($a,$b){
			$hasil = 2 * ($a + $b);
			echo $hasil;
		}
	}
	
		
/*
$cal = new kalkulator;
$cal->jumlah(5,6);
echo '<hr/>';
$cal->kali(5,6);
echo '<hr/>';
*/
$luas = new persegipanjang;
echo "L = ";
$luas->kali(5,8); //masukan nilai persegi panjang, untuk mencari luas
echo '<hr/>';
echo "K = ";
$luas->keliling(5,8); //masukan nilai persegi panjang untuk mencari keliling
