<?php
require('../../control/koneksi.php');
$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$alamat = $_POST['alamat'];
$paket = $_POST['paket'];
$status = $_POST['status'];
$cur = $_POST['cur'];
$aksi = $_GET['aksi'];
$kode = $_GET['kode'];


if ($aksi == "add") {
    $sql_addmat = "INSERT INTO subscription (nama,email,nomor,alamat,paket,status) VALUES ('$nama','$email','$nomor','$alamat','$paket','$status')";
    mysqli_query($koneksi, $sql_addmat);
    $state = "success";
    $message = "Pembayaran Succes";
    $message = urlencode($message);
    header("Location:../../index.php?message={$message}");
} else if ($aksi == "edit") {
    $sql_dos = "UPDATE subscription SET nama='$nama',email='$email',nomor='$nomor',alamat='$alamat',paket='$paket',status='$status' WHERE id='$cur'";
    mysqli_query($koneksi, $sql_dos);
    $message = "Data berhasil di Edit ";
    $state = "succes";
    header("Location:../list-subs.php?message={$message}&state=$state");
} else if ($aksi == "delete") {
    $sql_delmat = "DELETE FROM subscription WHERE id='$kode'";
    mysqli_query($koneksi, $sql_delmat);
    $message = "Berhasil Dihapus";
    $state = "succes";
    header("Location:../list-subs.php?message={$message}&state=$state");
}
