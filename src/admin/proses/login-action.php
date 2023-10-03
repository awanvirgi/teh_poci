<?php
session_start();

include "../../control/koneksi.php";

$email = $_POST["email"];
$p = $_POST["password"];

$sql = "select * from user where email='".$email."' and password='".$p."' limit 1";
$hasil = mysqli_query ($koneksi,$sql);
$jumlah = mysqli_num_rows($hasil);
	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["status"]=$row["status"];
		$_SESSION["nama"]=$row["nama"];
		$_SESSION["email"]=$row["email"];
        if($_SESSION['status']=='operator'){
            header("Location:../list-subs.php");
        }else{
            header("Location:../list-product.php");
        }
		
		
	}else {
		header("Location:../login.html");
	}
?>