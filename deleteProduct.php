<?php


@include 'config.php';
$db_name = 'Web bán điện thoại';
$user_name = 'root';
$user_password = '';


//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);
try {
    $stmt = $conn->prepare("DELETE FROM products WHERE name = ?");
    $stmt->bind_param("s", $_POST['productName']);
    if($stmt->execute()){
        echo "XÓA THÀNH CÔNG";
    }
} catch (mysqli_sql_exception $e) {
    echo "LỖI XẢY RA: " . $e->getMessage();
}


?>