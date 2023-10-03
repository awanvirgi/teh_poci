<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <script src="https://kit.fontawesome.com/c5b31b49c9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Ganti Password</title>
    <?php
    include_once("../control/session.php");
    ?>
</head>

<body>
    <div class="wrapper">
        <nav>
            <div class="nav-left">
                <div class="n-img-wrap">
                    <img src="../../assets/img/logo-poci.png" alt="logo">
                </div>
            </div>
            <div class="nav-right" id="nav-link">
            </div>
        </nav>
        <div class="loginpage">
            <form action="proses/changepw-action.php" method="post">
                <div class="form-box" style="color: black!important;">
                    <h3 style="color: black!important;">Ganti Password</h3>
                    <input type="hidden" name="email" value="<?php echo $email_admin?>">
                    <div class="input-area">
                        <label for="old" style="color: black!important;">Password Lama</label>
                        <input type="password" id="old" name="old" placeholder="Masukan password lama" class="form-control">
                    </div>
                    <div class="input-area">
                        <label for="new" style="color: black!important;">Password Baru</label>
                        <input type="password" id="new" name="new" placeholder="Masukan password baru" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>