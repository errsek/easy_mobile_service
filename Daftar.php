<?php

include("config.php");


if(isset($_POST['daftar'])){

    
    $Nama = $_POST['Nama_Lengkap'];
    $Email = $_POST['Alamat_Email'];
    $No_Hp = $_POST['No_Handphone'];
    $Password = $_POST['Password'];
  

    $sql = "INSERT INTO buat_akun (Nama_Lengkap, Alamat_Email, No_Handphone, Password) VALUE ('$Nama', '$Alamat', '$No_Hp', '$Pw')";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: Daftar.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: Daftar.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>