<?php 
@include 'config.php';

   $db_name = 'Web bán điện thoại';
   $user_name = 'root';
   $user_password = '';

//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);
session_start();
?>



<!DOCTYPE html>
<html lang="en"></html>

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/admin.css"> -->
    <!-- font icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />

    <title>adminPage</title>
    <style>
   <?php include "./assets/css/admin.css" ?>
  <?php include "./assets/css/base.css" ?> 
</style>

</head>
<body>
<!-------------------------THANH SIDEBAR -----------------------------  -->
    <div class="wrapper">
        
        <div class="sidebar">
            <h2 class="sidebar__shopname">BANDIENTHOAI</h2>
                <ul>
                <li><a href="http://localhost/Web-bandienthoai/adminWeb.php"><i class="fas fa-home sidebar__icon"></i>Trang chủ</a></li>
                <li><a href="http://localhost/Web-bandienthoai/adminWeb_account.php"><i class="fas fa-user sidebar__icon"></i>Tài khoản</a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping sidebar__icon"></i></i>Đơn hàng</a></li>
                <li><a href="#"><i class="fa-solid fa-message sidebar__icon"></i>Tin nhắn</a></li>
                </ul>
        </div>

    </div>


    <div class="account__info">
        <div class="account__info__header">
            <h2>THÔNG TIN TÀI KHOẢN</h2>
        </div>

        <div class="account__container">
        <?php 
            $username= $_SESSION['username'];  
            $password=$_SESSION['password'];
            $select_account=mysqli_query($conn,"select * from account where username='".$username."'AND password='".$password."' limit 1");
            if(mysqli_num_rows($select_account)>0)
            {
                // echo"dat";
            $fetch_account=mysqli_fetch_assoc($select_account);       
            };
        ?>
            <div class="account__container__info">
              
                <h3 style="text-transform:uppercase">TÊN NGƯỜI DÙNG:     <?php echo $fetch_account['nickname'];  ?></h3>
                <h3>EMAIL:  <?php echo $fetch_account['email'];  ?></h3>
                <h3>SỐ ĐIỆN THOẠI:  <?php echo $fetch_account['phone'];  ?></h3>
                <h3 style="text-transform:uppercase">QUYỀN TRUY CẬP:  <?php echo $fetch_account['role'];  ?> </h3>
            </div>
            
            <img style="width:200px" src="./assets/img/profile.png" alt="">
        </div>
        
    
    
    </div>

</body>