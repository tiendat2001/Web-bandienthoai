<?php

@include 'database.php';
@include 'config.php';

session_start();
session_unset();
// user damtiendat 1,  dinhlam 123   admin nguyensontung 1
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
   
    // var_dump($hashed_password);
    // $result=password_verify($password, $hashed_password);
    // var_dump($result);
  
    // $sql="select * from account where username='".$uname."'AND password='".$password."' AND role='user' limit 1";
    $sql = "SELECT password, role FROM account WHERE username = '$uname' LIMIT 1";
    
    $result = $conn -> query($sql);
    // neu dung username, check tiep password
    if( $result->num_rows ==1){
    //     $_SESSION['username']= $uname;
    
    //     header('Location: http://localhost/Web-bandienthoai/web.php');
    //     exit();
    // }
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    $role = $row['role'];
  // check xem tai khoan co la user hay ko
    if (password_verify($password, $hashed_password) && $role == "user") {
        $_SESSION['username'] = $uname;
        header('Location: http://localhost/Web-bandienthoai/web.php');
        exit();
    }
    // neu ko thi tiep tuc check xem co phai admin hay ko
    else{
        if (password_verify($password, $hashed_password) && $role == "admin") {
            $_SESSION['usernameAdmin'] = $uname;
            header('Location: http://localhost/Web-bandienthoai/adminWeb.php');
            exit();
        }
        // vua ko phai la admin, user thi sai mat khau
        else{
            echo "<script type='text/javascript'>
            window.onload=function(){alert('SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU');};
                    </script>";
          
        }
        
  
    }

    // ko dung username trong database
} else{
    echo "<script type='text/javascript'>
    window.onload=function(){alert('SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU');};
            </script>";
  
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
  <!-- Design by foolishdeveloper.com -->
    <title>Bandienthoai</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
    <?php include "./assets/css/loginPage.css"?>
    <?php include "./assets/css/main.css"?>
   

    </style>


    <!--Stylesheet-->
   

</head>
<body>
   
    <form  method="POST" action="#">
        <h3>Đăng nhập</h3>

        <label for="username">Tên đăng nhập</label>
        <input class="form__input" type="text" placeholder="Tên đăng nhập" id="username" name="username">

        <label for="password">Mật khẩu</label>
        <input class="form__input" type="password" placeholder="Mật khẩu" id="password" name="password">

        <button>Đăng nhập</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i> Google</div>
          <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
</body>
</html>
