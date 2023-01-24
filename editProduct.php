<?php


@include 'config.php';
include 'database.php';
session_start();

//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the form

$name = $_POST['name'];
$image = $_POST['image'];
$price = $_POST['price'];
$price_format = doubleval(str_replace(".", "", $price));
$type = $_POST['type'];

// Update the row in the database
$sql = "UPDATE  products SET name='$name', image='$image', price='$price_format', type='$type' WHERE  name='$name'";
if (mysqli_query($conn, $sql)) {
    // header('Location: http://localhost/Web-bandienthoai/adminWeb.php');
    // exit();
    $_SESSION["successEdit_message"] = "Record updated successfully";
    echo "<script>location.href='adminWeb.php'</script>";
   
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

?>