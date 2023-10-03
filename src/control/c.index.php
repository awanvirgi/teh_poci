<?php 
    require('koneksi.php');
    $showrekom = mysqli_query($koneksi,"SELECT * FROM product where recomended='yes'");
    $showall = mysqli_query($koneksi,"SELECT * FROM product");

?>