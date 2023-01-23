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

    <title>Bandienthoai</title>
    <style>
  /* <?php include "./assets/css/main.css" ?> */
  /* <?php include "./assets/css/base.css" ?> */
</style>

</head>

<body>
    <h3><?php echo  $_SESSION['ProductName_detail'];   ?></h3>
    <h3><?php echo $_SESSION['ProductImg_detail'];   ?></h3>
    <h3><?php echo  $_SESSION['ProductPrice_detail'];   ?></h3>



</body>