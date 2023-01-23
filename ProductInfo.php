<?php


@include 'config.php';
$db_name = 'Web bán điện thoại';
$user_name = 'root';
$user_password = '';
session_start();


//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);

if(isset($_POST['productName'])){

$test= $_POST['productName'];

   $select_product=mysqli_query($conn,"SELECT * FROM products where name ='".$test."'");
   $fetch_product=mysqli_fetch_assoc($select_product); 

   $_SESSION['ProductName_detail']=$fetch_product['name'];
   $_SESSION['ProductImg_detail']=$fetch_product['image'];
   $_SESSION['ProductPrice_detail']=$fetch_product['price'];
  

}

?>
