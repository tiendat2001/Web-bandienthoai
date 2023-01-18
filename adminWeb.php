<?php 
@include 'config.php';

   $db_name = 'Web bán điện thoại';
   $user_name = 'root';
   $user_password = '';

//    $conn = new PDO($db_name, $user_name, $user_password);
$conn = new mysqli("localhost",$user_name,$user_password,$db_name);
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


    <div class="wrapper">
        
        <div class="sidebar">
            <h2 class="sidebar__shopname">BANDIENTHOAI</h2>
                <ul>
                <li><a href="#"><i class="fas fa-home sidebar__icon"></i>Trang chủ</a></li>
                <li><a href="#"><i class="fas fa-user sidebar__icon"></i>Tài khoản</a></li>
                <li><a href="#"><i class="fa-solid fa-cart-shopping sidebar__icon"></i></i>Đơn hàng</a></li>
                <li><a href="#"><i class="fa-solid fa-message sidebar__icon"></i>Tin nhắn</a></li>
                </ul>
        </div>

    </div>

    <!------------------------------------------ DANH MUC SAN PHAM ------------------------------------------->
    <section class="container__product">
       <div class="container__product__tiltle">
        <h2>DANH MỤC SẢN PHẨM </h2>
        <div class="container__product__btn-searchbar">
            
            <div  class="container__product__searchbar">
            <input type="text" class="container__searchbar-input" placeholder="Nhập để tìm kiếm sản phẩm">
            </div>
            <button  id="openAddForm">Thêm sản phẩm</button>
        </div>
     
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
                        <th>CHỌN</th>
                    </tr>
                </thead>

                <tbody class="cartTbl_body">
                <?php 
                    $select_product=mysqli_query($conn,"SELECT * FROM product ORDER BY type ");
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
                        <?php 
                            echo '<td class="product-delete" style="cursor:pointer" onClick="deleteRow(\''.$fetch_product['name'].'\')">XÓA</td>';
                        ?>
                       
                       <td class="product-edit">
                        CHỈNH SỬA
                        </td>
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

    <!------------------------ FORM THEM SAN PHAM ----------------------------------->
    <div id="addProduct" class="container__addProduct">
        
        <div class="addProduct__title">
                <h3>THÊM SẢN PHẨM</h3>
            </div>
            
            <form id="addForm" method="POST" action="#">
                <div class="form__input-wrap">
                    <input class="form__input" type="text" name="name" placeholder="TÊN SẢN PHẨM" required>
                </div>
                <div class="form__input-wrap">
                    <input class="form__input" type="text" name="image" placeholder="LINK ẢNH" required>
                </div>

                <div class="form__input-wrap">
                    <input class="form__input" type="text" name="price" placeholder="GIÁ" required>
                </div>

                <div class="form__input-wrap">
                    <input class="form__input" type="text" name="type" placeholder="LOẠI" required>
                </div>


                <div class="form__input-wrap form__input-wrap-submit ">
                    <input type="submit" type="submit" value="XÁC NHẬN" class="btn-submit" />
                </div>

            </form>
    <button id ="closeAddForm">X</button>
    </div>
    
<!-- 
    <script>
    var form = document.getElementById("addForm");

  // Add an event listener for the submit event
  form.addEventListener("submit", function(event) {
    event.preventDefault(); // prevent the form from submitting
    var addForm = document.querySelector(".container__addProduct")
    addForm.style.visibility="hidden"
    
  });
    </script> -->

    <!------------------------ THÊM SẢN PHẨM VÀO DATABASE  -------------------------------------------->
    <?php
   
   
    if(isset($_POST['name']) && ! empty($_POST['name'])) {
        $name = $_POST['name'];
        $img = $_POST['image'];
        $price = $_POST['price'];
        $type = $_POST['type'];

        $sql = "SELECT * FROM product WHERE name='$name'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            echo "<script type='text/javascript'>alert('SẢN PHẨM ĐÃ TỒN TẠI');</script>";
        } else {
            //code to insert new product
            $query = "INSERT INTO product (name,image,price,type) 
                    VALUES ('$name', '$img', '$price','$type')";
            if ($conn->query($query) === TRUE) {
               


//                 echo '
//                 <script type="text/javascript">
//                 $(document).ready(function() {
//                     // some code here
//                   });
//                 </script>
// ';
//  reload lại trang web
                echo '<meta http-equiv="refresh" content="0">';
                echo "<script type='text/javascript'>
                alert('THÊM THÀNH CÔNG');
                </script>";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
        $_POST = NULL;
        $db = null;

    }         
   

    ?>
    
<footer>
        <div class="alert alert-addCartSuccess">
            <h3>Thêm vào giỏ hàng thành công</h3>
            <a class="alert__close">&times</a>
        </div>

</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    <?php require_once("admin.js");?>
</script>


</body>
</html>