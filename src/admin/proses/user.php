<?php
require('../../control/koneksi.php');

$email = $_POST['email'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$status = $_POST['status'];
$cur = $_POST['cur'];
$aksi = $_GET['aksi'];
$kode = $_GET['kode'];


if ($aksi == "add") {
    $sql_addmat = "INSERT INTO user (nama,email,password,status) VALUES ('$nama','$email','$password','$status')";
    mysqli_query($koneksi, $sql_addmat);
    $state = "success";
    $message = "Data Berhasil Ditambahkan";
    $message = urlencode($message);
    header("Location:../list-user.php?message={$message}&state=$state");
} else if ($aksi == "edit") {
    if($password){
        $sql_dos = "UPDATE user SET nama='$nama',email='$email',password='$password',status='$status' WHERE id='$cur'";
    }else{
        $sql_dos = "UPDATE user SET nama='$nama',email='$email',status='$status' WHERE id='$cur'";
    }
    
    mysqli_query($koneksi, $sql_dos);
    $message = "Data berhasil di Edit ";
    $state = "succes";
    header("Location:../list-user.php?message={$message}&state=$state");
} else if ($aksi == "delete") {
    $sql_delmat = "DELETE FROM user WHERE id='$kode'";
    mysqli_query($koneksi, $sql_delmat);
    $message = "Berhasil Dihapus";
    $state = "succes";
    header("Location:../list-user.php?message={$message}&state=$state");
}
