<?php

include('./config.php');
$pesan='';

if(isset($_POST['buat'])){
	$Nama_Lengkap = $_POST['Nama_Lengkap'];
	$Alamat_Email = $_POST['Alamat_Email'];
	$No_Handphone =$_POST['No_Handphone'];
	$Password = $_POST['Password'];
	
	if(!query('SELECT Nama_Lengkap FROM buat_akun WHERE buat_akun.Nama_Lengkap = :Nama_Lengkap',
	array(':Nama_Lengkap'=>$Nama_Lengkap))){
		query('INSERT INTO buat_akun VALUES (\'\',:Nama_Lengkap,:Alamat_Email,:No_Handphone,:Password)',
		array(':Nama_Lengkap'=>$Nama_Lengkap,'Alamat_Email'=>$Alamat_Email,'No_Handphone'=>$No_Handphone,'Password'=>$Password));
		$pesan = "Berhasil Mendaftar";
		header("location: login.html");
	}else{
 	echo "<script>alert ('Alamat Email sudah digunakan')</script>";
 	header("location: register.html"); 
	}
}
?>