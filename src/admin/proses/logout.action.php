<?php
session_start();

$_SESSION["status"];
$_SESSION["nama"];
$_SESSION["email"];

unset($_SESSION["status"]);
unset($_SESSION["nama"]);
unset($_SESSION["email"]);

session_unset();
session_destroy();
header('Location:../login.html');

?>