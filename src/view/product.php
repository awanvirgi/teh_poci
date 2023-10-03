<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "../control/c.index.php";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/product.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c5b31b49c9.js" crossorigin="anonymous"></script>

    <title>Teh Poci | Product</title>
</head>

<body>
    <div class="wrapper">
        <main>
            <nav>
                <div class="nav-left">
                    <div class="n-img-wrap">
                        <img src="../../assets/img/logo-poci.png" alt="logo">
                    </div>
                    <div class="hamburger">
                        <button class="bg-transparent border-0" onclick="hamburger()">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="nav-right" id="nav-link">
                    <ul class="nav">
                        <li class="nav-item"><a href="../index.php">Home</a></li>
                        <li class="nav-item"><a href="product.php">Products</a></li>
                        <li class="nav-item"><a href="about.html">About Us</a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-content">
                <div class="mc-right">
                    <div class="mcr-wrap">
                        <div class="mcr-header mb-4 text-end">
                            <h4>BANYAK VARIAN YANG BISA DINIKMATI</h4>
                        </div>
                        <div class="mcr-list">
                            <?php
                            $data = $showall->fetch_all(MYSQLI_ASSOC);
                            $r = 1;
                            foreach ($data as $list) {
                                if ($r === 1) {
                                    $first = $list['splash'];
                                }
                            ?>
                                <div class="box-wrap">
                                    <input type="radio" value="<?php echo $list['nama'] ?>" name="drinklist" id="<?php echo $list['nama'] ?>" <?php if ($r === 1) { ?> checked <?php } ?>>
                                    <label for="<?php echo $list['nama'] ?>" class="box-list">
                                        <img src="../../assets/img/product/<?php echo $list['thumbnail'] ?>" alt="<?php echo $list['nama'] ?>" class="img-fluid list-item">
                                    </label>
                                </div>
                            <?php
                                $r++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="mc-left">
                    <div class="mcl-wrap">
                        <img src="../../assets/img/product/<?php echo $first ?>" class="img-fluid" alt="" id="productsplash" name="productsplash">
                    </div>
                </div>
            </div>
        </main>
        <div class="copyright bg-dark h-100 text-center">
            Created by : Riezky Fauzi, Alfian Nursahbani ,Virgiawan Sanria
        </div>
    </div>
</body>
<script src="../animate/main.js"></script>
<script src="../animate/button.js"></script>

</html>