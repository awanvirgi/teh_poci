<?php
require('../../control/koneksi.php');
$cur = $_POST['cur'];
$kode = $_GET['kode'];
$nama = $_POST['nama'];
$recom = $_POST['recom'];
if (!$recom) {
    $recom = 'no';
}
$aksi = $_GET['aksi'];
$thumb = $_FILES['thumb']["name"];
$tmp_thumb = $_FILES['thumb']['tmp_name'];
$typethumb = strtolower(pathinfo($thumb, PATHINFO_EXTENSION));

$splash = $_FILES['splash']["name"];
$tmp_splash = $_FILES['splash']['tmp_name'];
$typetsplash = strtolower(pathinfo($splash, PATHINFO_EXTENSION));
$target_dir = "../../../assets/img/product/";
if ($aksi === 'add') {
    $uploadok = 1;
    $state = "failed";
    if (!getimagesize($tmp_splash) | !getimagesize($tmp_thumb)) {
        $message = "Masukan File berupa gambar!";
        $uploadok = 0;
    }
    $newthumb = $nama . "-list." . $typethumb;
    $move_thumb = $target_dir . $newthumb;
    $newsplash = $nama . "-splash." . $typetsplash;
    $move_splash = $target_dir . $newsplash;
    if (file_exists($move_thumb) | file_exists($move_splash)) {
        $message = "Maaf FIle sudah ada";
        $uploadok = 0;
    }
    if ($uploadok === 1) {
        $insert = "INSERT INTO product(nama,splash,thumbnail,recomended) VALUES ('$nama','$newsplash','$newthumb','$recom')";
        $query = mysqli_query($koneksi, $insert);
        if ($query) {
            move_uploaded_file($tmp_thumb, $move_thumb);
            move_uploaded_file($tmp_splash, $move_splash);
            $message = "Product Berhasil ditambahkan";
            $state = "success";
        } else {
            $message = "Product gagal Ditambahkan";
        }
    }
    $message = urlencode($message);
    header("location:../list-product.php?message={$message}&state=$state");
}

if ($aksi === 'edit') {
    $cekrekom = "SELECT * FROM product where recomended='yes'";
    $qrcek = mysqli_query($koneksi, $cekrekom);
    if (mysqli_num_rows($qrcek) >= 4 & $recom == 'yes') {
        $message = "Rekomendasi Sudah Mencapai 4";
        $state = "failed";
    } else {
        $select_product = "SELECT * FROM product where id='$cur'";
        $qr = mysqli_query($koneksi, $select_product);
        while ($data = mysqli_fetch_array($qr)) {
            $oldname = $data['nama'];
            $oldthumb = $data['thumbnail'];
            $oldsplash = $data['splash'];
        }
        if ($tmp_splash) {
            $newsplash = $nama . "-splash." . $typetsplash;
            $move_splash = $target_dir . $newsplash;
            move_uploaded_file($tmp_splash, $move_splash);
        } else {
            $dirsplash = $target_dir . $oldsplash;
            $typetsplash = strtolower(pathinfo($oldsplash, PATHINFO_EXTENSION));
            $newsplash = $nama . "-splash." . $typetsplash;
            $editsplash = $target_dir . $newsplash;
            rename($dirsplash, $editsplash);
        }

        if ($tmp_thumb) {
            $newthumb = $nama . "-list." . $typethumb;
            $move_thumb = $target_dir . $newthumb;
            move_uploaded_file($tmp_thumb, $move_thumb);
        } else {
            $dirthumb = $target_dir . $oldthumb;
            $typethumb = strtolower(pathinfo($oldthumb, PATHINFO_EXTENSION));
            $newthumb = $nama . "-list." . $typethumb;
            $editthumb = $target_dir . $newthumb;
            rename($dirthumb, $editthumb);
        }
        $edit = "UPDATE product SET nama='$nama',splash='$newsplash',thumbnail='$newthumb',recomended='$recom' WHERE id='$cur'";
        $qr = mysqli_query($koneksi, $edit);
        if ($qr) {
            $message = "Product Berhasil diedit";
            $state = "success";
        } else {
            $message = "Product Berhasil diedit";
            $state = "failed";
        }
    }
    header("location:../list-product.php?message={$message}&state=$state");
}

if ($aksi == 'delete') {
    $select_product = "SELECT * FROM product where id='$kode'";
    $qr = mysqli_query($koneksi, $select_product);
    while ($data = mysqli_fetch_array($qr)) {
        $tmpthumb = $data['thumbnail'];
        $tmpsplash = $data['splash'];
    }
    $delete = "DELETE FROM product WHERE id='$kode'";
    $cek = mysqli_query($koneksi, $delete);
    if ($cek) {
        unlink("$target_dir$tmpsplash");
        unlink("$target_dir$tmpthumb");
        $message = "Berhasil Dihapus";
        $state = "succes";
        echo "Mantap";
    } else {
        echo "Yey";
        $message = "Gagal Dihapus";
        $state = "failed";
    }
    header("location:../list-product.php?message={$message}&state=$state");
}
