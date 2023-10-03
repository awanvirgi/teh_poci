<?php 
require('../../control/koneksi.php');
$email = $_POST['email'];
$old = $_POST['old'];
$new = $_POST['new'];

$cekuser = "SELECT * FROM user where email ='$email'";
$sqlcek = mysqli_query($koneksi,$cekuser);
while($data_user = mysqli_fetch_array($sqlcek)){
    echo $oldpass = $data_user['password'];
};
if($oldpass == $old){
    $change = "UPDATE user set password='$new' where email='$email'";
    mysqli_query($koneksi,$change);
    header("location:../login.html");
}else{
    $state = 'failed';
    $message = 'Password gagal diganti';
    header("location:../list-subs.php?message={$message}&state=$state");

}
?>