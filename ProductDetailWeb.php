<?php
include 'database.php';
@include 'config.php';
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- <link rel="stylesheet" href="assets/css/base.css"> -->
    <!-- <link rel="stylesheet" href="./assets/css/main2.css"> -->
    <!-- font icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />

    <title><?php echo  $_SESSION['ProductName_detail'];   ?></title>
    <style>
   <?php include "./assets/css/main.css" ?> 
   <?php include "./assets/css/base.css" ?> 
</style>

</head>

<body>
     <div class="header">

        <div class="grid">
            <!-- navbar co 2 list 2 ben -->
            <nav class="header__navbar">

                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__item-has-qr">Tải ứng dụng
                        <div class="header__qr">
                            <img class="header__qr-img"
                                src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/d91264e165ed6facc6178994d5afae79.png"
                                alt="">
                            <div class="header__qr-apps">
                                <img class="header__qr-download"
                                    src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/39f189e19764dab688d3850742f13718.png"
                                    alt="">
                                <img class="header__qr-download"
                                    src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/f4f5426ce757aea491dce94201560583.png"
                                    alt="">
                            </div>
                        </div>

                    </li>

                    <li class="header__navbar-item">
                        Kết nối
                        <a href="https://www.facebook.com/profile.php?id=100008788777436" target="blank"
                            class="header__navbar-icon-link">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                    </li>
                </ul>

                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-icon-link">
                            <i class="fa-regular fa-bell"></i>
                        </a>
                        Thông báo
                    </li>

                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-icon-link">
                            <i class="fa-regular fa-circle-question"></i>
                        </a>
                        Hỗ trợ
                    </li>
                   
                    <?php 
                            $username= $_SESSION['username'];  
                         
                            $select_account=mysqli_query($conn,"select * from account where username='".$username."' limit 1");
                            if(mysqli_num_rows($select_account)>0)
                            {
                                // echo"dat";
                            $fetch_account=mysqli_fetch_assoc($select_account);       
                            };
                         ?>

                        <li style="font-weight:bold" class="header__navbar-item">Xin chào,
                            <?php echo $fetch_account['nickname'];  ?> </li>
                        <!-- <li class="header__navbar-item">Đăng nhập</li> -->
                        <!-- NÚT ĐĂNG XUẤT -->
                        <li class="header__navbar-item"> <a style=" text-decoration: none; color:white;"
                                href="http://localhost/Web-bandienthoai/login.php">Đăng xuất</a></li>
                </ul>


            </nav>


            <div class="header__search">
                <h1 class="header__shopname">Bandienthoai</h1>
                <div class="header__searchbar">
                    <div class="header__searchbar-input-wrap">
                        <input type="text" class="header__searchbar-input" placeholder="Nhập để tìm kiếm sản phẩm">
                    </div>

                    <button class="header__search-btn">
                        <i class="header__search-btn-icon fas fa-search"></i>
                    </button>
                </div>


                <!-- <i class="header__iconshop fa-solid fa-cart-shopping fa-2x"></i> -->
            </div>
        </div>


    </div>


    <div class="container">
        <div class="container__productDetail">
            <div class="productDetail__name-img">
                <h3><?php echo  $_SESSION['ProductName_detail'];   ?></h3>
                <img src="<?php echo $_SESSION['ProductImg_detail'];   ?>" alt="">
            </div>
        
            <div class="productDetail__price-descrip">
                <h3>GIÁ TIỀN: <?php echo  $_SESSION['ProductPrice_detail'];   ?></h3>
                <p><?php echo  $_SESSION['ProductDescription_detail'];   ?></p>
                <button class="productDetail__btn-order">MUA NGAY</button>
            </div>

        </div>
    
    
    </div>




</body>