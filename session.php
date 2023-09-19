<?php 
session_start();
$_SESSION['un']=$_POST['name'];
$_SESSION['em']=$_POST['email'];
// $_SESSION['pw']=$_POST['password'];
$_SESSION['pw']=md5($_POST['password']);
$_SESSION['fc']=$_POST['fullname'];
$_SESSION['flag']=$_POST['flag'];

header("Location:otp.php");


?>