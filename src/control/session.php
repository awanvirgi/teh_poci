<?php
session_start();

if (!isset($_SESSION["email"])) {
	header("Location:../admin/login.html");
	exit;
}
$status_admin=$_SESSION["status"];
$nama_admin=$_SESSION["nama"];
$email_admin=$_SESSION["email"];

?>
