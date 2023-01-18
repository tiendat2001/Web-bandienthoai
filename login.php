<?php

@include 'database.php';
@include 'config.php';
session_start();

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    // check xem tai khoan co la user hay ko
    $sql="select * from account where username='".$uname."'AND password='".$password."' AND role='user' limit 1";
    
    $result = $conn -> query($sql);
    
    if( $result->num_rows ==1){
        $_SESSION['username']= $uname;
        $_SESSION['password']= $password;
        header('Location: http://localhost/Web-bandienthoai/web.php');
        exit();
    }
    // neu ko thi tiep tuc check xem co phai admin hay ko
    else{
        $sql="select * from account where username='".$uname."'AND password='".$password."' AND role='admin' limit 1"; 
        $result = $conn -> query($sql);  
        if( $result->num_rows ==1){
        $_SESSION['username']= $uname;
        $_SESSION['password']= $password;
        header('Location: http://localhost/Web-bandienthoai/adminWeb.php');
        exit();
        }
        // vua ko phai la admin, user thi sai mat khau
        else{
            echo '<script type="text/JavaScript"> 
        alert("Sai tên đăng nhập hoặc mật khẩu")
      
     </script>';
        }
        
    //  header('Location: http://localhost/Web-bandienthoai/login.php');
    }
        /*
          var LoginFailed = document.querySelector(".login-failed")
        LoginFailed.style.visibility="visible"
      
        setTimeout( function AlertAddCartSuccess(){
          document.querySelector(".login-failed").style.visibility="hidden"
        }, 3000)
        */
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login Form in HTML5 and CSS3</title>

    <link rel="stylesheet" a href="assets/fonts/fontawesome/css/all.min.css">
    <style>
    <?php include "./assets/css/login.css"?>
    <?php include "./assets/css/main.css"?>
   

    </style>




</head>

<body class="body-login">

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
                    <li class="header__navbar-item">Tiếng Việt</li>
                    <li class="header__navbar-item">Đăng ký</li>
                    <li id="btn_login" class="header__navbar-item">Đăng nhập</li>
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
    <!-- 
<div class="modal-login">
        <div class="modal__overlay">

        </div>
</div> -->
    <div class="noti-center">
        <h3>Vui lòng đăng nhập để xem sản phẩm</h3>
        <button class="btn__login-center">ĐĂNG NHẬP</button>
    </div>

    <div class="container_login">


        <div class="login__title">
            <h3>Đăng nhập</h3>
        </div>

        <form method="POST" action="#">
            <div class="form__input-wrap">
                <input class="form__input" type="text" name="username" placeholder="Tên đăng nhập" />
            </div>
            <div class="form__input-wrap">
                <input class="form__input" type="password" name="password" placeholder="Mật khẩu" />
            </div>
            <div class="form__input-wrap">
                <input type="submit" type="submit" value="Đăng nhập" class="btn-login" />
            </div>

        </form>

        <button id="btn__login-close">X</button>
        <div class="login-failed">
            <h3>Tên đăng nhập hoặc mật khẩu không đúng</h3>
        </div>
    </div>






</body>
<!-- bat su kien khi an nut dang nhap hien bang dang nhap -->
<script>
const login_btn = document.getElementById("btn_login");
login_btn.addEventListener("click", function() {
    document.querySelector(".container_login").style.display = "block"
})

// nut dang nhap thu 2
const login_btn_1 = document.getElementsByClassName("btn__login-center");
login_btn_1[0] .addEventListener("click", function() {
    document.querySelector(".container_login").style.display = "block"
})
// nut dong form dang nhap
const login_btn_close = document.getElementById("btn__login-close");
login_btn_close.addEventListener("click", function() {
    document.querySelector(".container_login").style.display = "none"
})
</script>
<?php /*
    $select_product=mysqli_query($conn,"SELECT * FROM product");
    if(mysqli_num_rows($select_product)>0){
        // echo"dat";
        while($fetch_product=mysqli_fetch_assoc($select_product)){
            ?>
<h3><?php echo $fetch_product['username'];?></h3>
<?php
        };
    };

 */?>

</html>