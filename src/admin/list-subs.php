<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/crud.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c5b31b49c9.js" crossorigin="anonymous"></script>
    <title>Subscription</title>

    <?php
    include_once("../control/koneksi.php");
    include_once("../control/session.php");
    $sql_subscription = "SELECT * FROM subscription";
    if (isset($_POST['search'])) {
        $searchkey = mysqli_real_escape_string($koneksi, $_POST['search-box']);
        $sql_subscription .= " WHERE nama LIKE '%$searchkey%'";
    }
    $result_subscription = mysqli_query($koneksi, $sql_subscription);
    $cur = 0;
    ?>
</head>

<body>
    <div class="wrapper d-flex">
        <div class="sidebars shadow" style="width: 320px;">
            <div class="s-wrapper vh-100  p-3">
                <div class="s-judul">
                    <h2>
                        Kelompok 6
                    </h2>
                </div>
                <hr class="border border-top border-2">
                <ul class="s-list nav mb-auto">
                    <li class="nav-item s-active">
                        <a href="list-subs.php">
                            <i class="fa-solid fa-people-arrows"></i>
                            Subscriptions
                        </a>
                    </li>
                    <?php if ($status_admin == 'admin') { ?>
                        <li class="nav-item">
                            <a href="list-product.php">
                                <i class="fa-solid fa-bottle-droplet"></i>
                                Product
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="list-user.php">
                                <i class="fa-solid fa-user"></i>
                                User
                            </a>
                        </li>
                    <?php } ?>

                </ul>
                <ul class="nav profile">
                        <div class="text-center">
                            <h3><?php echo $nama_admin ?></h3>
                            <p><?php echo $status_admin ?></p>
                        </div>
                        <hr>
                        <li class="nav-item">
                            <a href="changepw.php">
                                <i class="fa-solid fa-user"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="proses/logout.action.php">
                                <i class="fa-solid fa-user"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
        <main class="flex-grow-1 d-flex flex-column p-3">
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                $state = $_GET['state'];
                if ($state == "failed") {
            ?>
                    <div class="alert alert-warning w-100 p-3">
                        <h5><?= $message ?></h5>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success w-100 p-3">
                        <h5><?= $message ?></h5>
                    </div>
            <?php
                }
            }
            ?>
            <h3>Subscription</h3>
            <div class="table-area p-3">
                <div class="ta-action d-flex justify-content-between">
                    <form action="" method="post">
                        <div class="taa-search input-group">
                            <div class="search-area form-outline">
                                <input type="text" name="search-box" id="search-box" class="form-control" placeholder="Cari Nama subscription">
                            </div>
                            <button type="submit" name="search" class="btn btn-primary" style="padding: 0; padding-left: 0.5rem; padding-right: 0.5rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="ta-field">
                    <table class="table table-light table-bordered border-dark m-0">
                        <thead style="font-weight: 600;">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor WA</th>
                            <th>Alamat</th>
                            <th>Paket</th>
                            <th>Status</th>
                            <th style="width:0.1px;">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_subscription) == 0) {
                            ?>
                                <tr>
                                    <td colspan="7">
                                        Tidak Ada data
                                    </td>
                                </tr>
                                <?php
                            } else {
                                $batas = 10;
                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $previous = $halaman - 1;
                                $next = $halaman + 1;
                                $data = mysqli_query($koneksi, $sql_subscription);
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);
                                $sql_subscription .= " LIMIT $halaman_awal, $batas";
                                $data_subscription = mysqli_query($koneksi, $sql_subscription);
                                $nomor = $halaman_awal + 1;
                                while ($d = mysqli_fetch_array($data_subscription)) {
                                ?>
                                    <tr>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><?php echo $d['email']; ?></td>
                                        <td><?php echo $d['nomor']; ?></td>
                                        <td><?php echo $d['alamat']; ?></td>
                                        <td><?php echo $d['paket']; ?></td>
                                        <td><?php echo $d['status']; ?></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="?cur=<?= $d['id'] ?>"><button class="btn edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                                <a href="proses/subscription.php?kode=<?= $d['id'] ?>&aksi=delete"><button class="btn delete"><i class="fa-solid fa-trash"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between">
                    <form action="list-subscription.php" method="POST">
                        <button class="btn" name="clear" type="submit">Clear Filter</button>

                    </form>
                    <ul class="pagination m-0">
                        <?php
                        if (mysqli_num_rows($result_subscription) != 0) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                                        ?>href='?halaman=<?= $Previous ?>' ; <?php } ?>>Previous</a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                                if ($x == $halaman) {
                            ?>
                                    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php } else {

                                ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                                }
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        ?>href='?halaman=<?= $next ?>' ; <?php } ?>>Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </main>
        <?php

        if (isset($_GET['cur'])) {
            $cur = $_GET['cur'];
            include('../control/koneksi.php');
            $show = "SELECT * FROM subscription WHERE id='$cur'";
            $qr = mysqli_query($koneksi, $show);
            while ($data = mysqli_fetch_array($qr)) {
                $nama = $data['nama'];
                $email = $data['email'];
                $nomor = $data['nomor'];
                $alamat = $data['alamat'];
                $paket = $data['paket'];
                $status = $data['status'];
            };


        ?>
            <div class="input-area" style="display: flex;" id="input-area-del">
                <div class="ia-box">
                    <div class="iab-close">
                        <button class="btn close shadow-none" onclick="showdel()"><i class="fa-solid fa-xmark fa-xl"></i></button>
                    </div>
                    <div class="iab-input">
                        <h3 class="mb-3"> Edit subscription</h3>
                        <form action="proses/subscription.php?aksi=edit" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="aksi" id="aksi" value="edit">
                            <input type="hidden" name="cur" id="cur" value="<?php echo $cur ?>">
                            <div class="iab-field">
                                <label for="nama" class="label-control">Nama subscription</label>
                                <input type="nama" name="nama" id="nama" class="form-control" value="<?php echo $nama ?>">
                            </div>
                            <div class="iab-field">
                                <label for="email" class="label-control">email subscription</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
                            </div>

                            <div class="iab-field">
                                <label for="nomor" class="label-control">nomor</label>
                                <input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $nomor ?>">
                            </div>
                            <div class="iab-field">
                                <label for="alamat" class="label-control">alamat subscription</label>
                                <textarea type="text" name="alamat" id="alamat" class="form-control"><?php echo $alamat ?></textarea>
                            </div>
                            <div class="iab-field">
                                <label for="paket" class="label-control">Paket</label>
                                <select name="paket" id="paket" class="form-control">
                                    <option value="p-hemat" <?= ($paket == "p-hemat") ? 'selected' : '' ?>>Paket Hemat</option>
                                    <option value="p-regular" <?= ($paket == "p-regular") ? 'selected' : '' ?>>Paket Regular</option>
                                    <option value="p-besar" <?= ($paket == "p-besar") ? 'selected' : '' ?>>Paket Besar</option>
                                </select>
                            </div>
                            <div class="iab-field">
                                <label for="status" class="label-control">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending" <?= ($status == "pending") ? 'selected' : '' ?>>pending</option>
                                    <option value="proses" <?= ($status == "proses") ? 'selected' : '' ?>>proses</option>
                                    <option value="approved" <?= ($status == "approved") ? 'selected' : '' ?>>approved</option>
                                    <option value="canceled" <?= ($status == "canceled") ? 'selected' : '' ?>>canceled</option>
                                </select>
                            </div>
                            <div class="iab-field">
                                <input type="submit" class="btn btn-primary" value="Kirim">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</body>
<script src="../animate/button.js"></script>

</html>