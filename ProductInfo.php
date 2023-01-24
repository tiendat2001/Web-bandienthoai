<?php


@include 'config.php';
include 'database.php';
session_start();


//    $conn = new PDO($db_name, $user_name, $user_password);
if(isset($_POST['productName'])){

$test= $_POST['productName'];

   $select_product=mysqli_query($conn,"SELECT * FROM products,productsdetail where products.name ='".$test."' AND  products.name=productsdetail.name  " );
   $fetch_product=mysqli_fetch_assoc($select_product); 

   $_SESSION['ProductName_detail']=$fetch_product['name'];
   $_SESSION['ProductImg_detail']=$fetch_product['imageDetail'];

   $formatted_number_price = number_format($fetch_product['price'], 0, '.', '.');
   $_SESSION['ProductPrice_detail']= $formatted_number_price;

   $_SESSION['ProductDescription_detail']=$fetch_product['description'];
  

}

?>
