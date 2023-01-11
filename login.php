<?php

   $db_name = 'Web bán điện thoại';
   $user_name = 'root';
   $user_password = '';

//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);
@include 'config.php';
session_start();

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from account where username='".$uname."'AND password='".$password."' limit 1";
    
    $result = $conn -> query($sql);
    
    if( $result->num_rows ==1){
        $_SESSION['username']= $uname;
        header('Location: http://localhost/Web-bandienthoai/web.php');
        exit();
    }
    else{
        
        echo '<script type="text/JavaScript"> 
     alert("dat")
     </script>';
        exit();
    }
        
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	
	<link rel="stylesheet" a href="css\font-awesome.min.css">
    <style>
  <?php include "./assets/css/main.css" ?>
  <?php include "./assets/css/base.css" ?>
  <?php include "./assets/css/login.css" ?>
  
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
            <li class="header__navbar-item">Tiếng Việt</li>
            <li class="header__navbar-item">Đăng ký</li>
            <li class="header__navbar-item">Đăng nhập</li>
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
	
    <img src="image/login.png"/>
		<form method="POST" action="#"> 
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>

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

    