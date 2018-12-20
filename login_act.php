<?php
session_start();
include 'config.php';

$email = $_POST['Your_Email'];
$Password = $_POST['Password'];

$perintah = query('SELECT * FROM log_in WHERE Your_Email = :Your_Email AND Password = :Password',
array(':Your_Email'=>$email,':Password'=>$Password));
if (!empty($perintah)){
    $_SESSION['Your_Email'] = $email;
        redirect("index.html");
} else {
    echo "<script>alert ('Your Email / Password Salah')</script>";
    echo "<meta http-equiv=Refresh content=0;url=login.html>";
}
?>