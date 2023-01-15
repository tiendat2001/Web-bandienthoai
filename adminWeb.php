<?php 
@include 'database.php';
@include 'config.php';
?>



<!DOCTYPE html>
<html lang="en">

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
    <section class="container__product">
       <div class="container__product__tiltle">
        <h2>DANH MỤC SẢN PHẨM </h2>
       </div>
       
        <form action="">
            <table class="container__table">
                <!-- phan tieu de cac cot -->
                <thead>
                    <tr>
                        <th>TÊN SẢN PHẨM</th>
                        <th>ẢNH</th>
                        <th>GIÁ</th>
                        <th>LOẠI</th>
                        <th>CHỌN</th>
                    </tr>
                </thead>

                <tbody class="cartTbl_body">
                <?php 
                    $select_product=mysqli_query($conn,"SELECT * FROM product");
                    if(mysqli_num_rows($select_product)>0){
                        // echo"dat";
                        while($fetch_product=mysqli_fetch_assoc($select_product)){
                            ?>
                    <tr>
                        <td class="td__product__name">
                        <?php echo $fetch_product['name'];?>
                        </td>
                        <td class="td__product__img">
                            <img  src="<?php echo $fetch_product['image'];?>" alt="">                         
                        </td>
                        <td> <h3 style="display: inline;" class="product__price"><?php echo $fetch_product['price'];?></h3></td>
                        <td class="td__product__name">
                        <?php echo $fetch_product['type'];?>
                        </td>
                        <td style="cursor:pointer">XÓA</td>
                    </tr>
                <?php
                        };
                    };

                ?>
                    <!-- <tr>
                        <td class="td__product__name">
                            Điện thoại IPHONE 14
                        </td>
                        <td class="td__product__img">
                            <img  src="./assets/img/iphone14.jpg" alt="">                         
                        </td>
                        <td> <h3 style="display: inline;" class="product__price">8.200.000</h3></td>
                        <td class="td__product__name">
                           IPHONE
                        </td>
                        <td style="cursor:pointer">XÓA</td>
                    </tr> -->

                 


                </tbody>


            </table>

           

        </form>
    </section>



</body>
</html>