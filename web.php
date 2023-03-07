<?php
@include 'database.php';
@include 'config.php';
session_start();


// if(!isset($_SESSION['username'])){
//    header('location:login.php');
// }      
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
    <?php include "./assets/css/main.css"?><?php include "./assets/css/base.css"?>
    </style>

</head>

<body>

    <div class="main">
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



                        <?php
                           $nickname= 'Khách';
                           // néu chưa đăng nhập thì hiện nút đăng nhập
                           $isLogin="Đăng nhập";

                            if(isset($_SESSION['username'])){
                                $username= $_SESSION['username'];  
                         
                                $select_account=mysqli_query($conn,"select * from account where username='".$username."' limit 1");
                                if(mysqli_num_rows($select_account)>0)
                                {
                                    // echo"dat";
                                $fetch_account=mysqli_fetch_assoc($select_account);  
                                $nickname= $fetch_account['nickname'];
                                // nếu đã đăng nhập thì đổi chữ đăng nhập thành đăng xuất
                                $isLogin="Đăng xuất";


                                }
                               
                            } 
                         ?>

                                            
                        <?php if ($nickname === 'Khách'): ?>
                            <li style="font-weight:bold" class="header__navbar-item">Xin chào, <?php echo $nickname; ?></li>
                        <?php else: ?>
                            <li onclick="openInfoAccount()" style="font-weight:bold" class="header__navbar-item">Xin chào, <?php echo $nickname; ?></li>
                        <?php endif; ?>
                        <!-- <li class="header__navbar-item">Đăng nhập</li> -->
                        <!-- NÚT ĐĂNG XUẤT -->
                        <li class="header__navbar-item"> <a style=" text-decoration: none; color:white;"
                                href="http://localhost/Web-bandienthoai/loginPage.php"> <?php echo $isLogin;  ?></a></li>
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
            <section class="product">
                <div class="container_product">
                    <div class="container__product__title">
                        <h2>TUẦN LỄ IPHONE </h2>
                    </div>
                    <div class="product__items">

                        <?php 
					$select_product=mysqli_query($conn,"SELECT  * FROM products WHERE type='iphone' ORDER BY price DESC limit 5 ");
					if(mysqli_num_rows($select_product)>0)
					{
						while($fetch_product=mysqli_fetch_assoc($select_product))
						{
							?>


                        <div class="product__item">
                            <!--------- div wrap dan den link product_detail ------------->
                            <?php
                            echo ' <div class="product__item__detail-wrap" onClick="getDetailInfo(\''.$fetch_product['name'].'\')" >&nbsp</div>';
                            ?>

                            <img src="<?php echo $fetch_product['image'];?>" alt="">
                            <h3 class="product__name"><?php echo $fetch_product['name'];?></h3>
                            <div>

                                <h3 style="display: inline;" class="product__price">
                                    <?php
                                     $formatted_number_price = number_format($fetch_product['price'], 0, '.', '.');
                                     echo $formatted_number_price;
                                     ?>
                                </h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>
                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div>


                        <?php
        				};
    				};

 				?>

                    </div>
                </div>


                <div class="container__slideshow">
                    <div class="container__slideshow__title">
                        <h2>CHUỖI MỚI DEAL KHỦNG </h2>
                    </div>
                    <div class="mySlides fade">
                        <div class="slideshow__items">
                            <div class="slideshow__items">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow1.png" />

                                </a>
                            </div>

                            <div class="slideshow__items">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow1.png" />

                                </a>
                            </div>

                            <div class="slideshow__items slideshow__items-3">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow1.png" />

                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="mySlides fade">
                        <div class="slideshow__items">
                            <div class="slideshow__items">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow2.png" />

                                </a>
                            </div>

                            <div class="slideshow__items">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow2.png" />

                                </a>
                            </div>

                            <div class="slideshow__items slideshow__items-3">
                                <a href="https://www.facebook.com/" target="blank">
                                    <img src="assets/img/slideshow2.png" />

                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container__productList">

                    <div class="productList__title">
                        <h3>DANH MỤC SẢN PHẨM</h3>

                    </div>

                    <div class="productList__items">


                        <?php 
                            $select_product=mysqli_query($conn,"SELECT * FROM products ORDER BY price DESC ");
                            if(mysqli_num_rows($select_product)>0){
                                // echo"dat";
                                while($fetch_product=mysqli_fetch_assoc($select_product)){
                                    ?>

                        <!-- ô sản phẩm -->
                        <div class="product__item">
                             <!--------- div wrap dan den link product_detail ------------->
                             <?php
                            echo ' <div class="product__item__detail-wrap" onClick="getDetailInfo(\''.$fetch_product['name'].'\')" >&nbsp</div>';
                            ?>
                            
                            <img src="<?php echo $fetch_product['image'];?>" alt="">
                            <h3 class="product__name"><?php echo $fetch_product['name'];?></h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">
                                    <?php 
                                              $formatted_number_price = number_format($fetch_product['price'], 0, '.', '.');
                                              echo $formatted_number_price;
                                            
                                            ?></h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>
                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                        <?php
                                };
                            };

                        ?>



                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/253402/realme-c21-y-blue-600x600.jpg"
                                alt="">
                            <h3 class="product__name">Realme C1-Y</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">8.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>
                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/283828/TimerThumb/vivo-v25e-(2).jpg"
                                alt="">
                            <h3 class="product__name">Vio V25E</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">9.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>
                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">
                            <img src="https://cdn.tgdd.vn/Products/Images/42/288404/oppo-a17k-vang-thumb-%C4%83-600x600.jpg"
                                alt="">
                            <h3 class="product__name">OPPO A17K</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">10.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>
                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->
                        <!-- 
                        <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->
                        <!-- 
                        <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                        <!-- <div class="product__item">

                            <img src="https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg"
                                alt="">

                            <h3 class="product__name">OPPO A55</h3>
                            <div>
                                <h3 style="display: inline;" class="product__price">18.200.000</h3>
                                <h3 style="display: inline;"><sup>đ</sup> </h3>
                            </div>



                            <button class="product__item__button">THÊM VÀO GIỎ HÀNG</button>
                        </div> -->

                    </div>
                </div>

            </section>
            <!-- PHAN GIO HANG -->

            <section class="container__cart">
                <button class="cart__closeForm">X</button>
                <h2 class="container__cart__tiltle">GIỎ HÀNG </h2>
                <form action="">
                    <table class="container__table">
                        <!-- phan tieu de cac cot -->
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>GIÁ (đồng)</th>
                                <th>SỐ LƯỢNG</th>
                                <th>CHỌN</th>
                            </tr>
                        </thead>

                        <tbody class="cartTbl_body">
                            <!-- <tr>
                                <td class="td__product__img-name">
                                    <img src="./assets/img/iphone14.jpg" alt="">Điện thoại IPHONE 14
                                </td>
                                <td>
                                    <h3 style="display: inline;" class="product__price">8.200.000</h3>
                                </td>
                                <td><input style="width: 30px; outline:none;" type="number" value="1" min="0"></td>
                                <td style="cursor:pointer">XÓA</td>
                            </tr>

                            <tr>
                                <td class="td__product__img-name">
                                    <img src="./assets/img/iphone14.jpg" alt="">Điện thoại IPHONE 14
                                </td>

                                <td>
                                    <h3 style="display: inline;" class="product__price">8.200.000</h3>
                                </td>

                                <td><input style="width: 30px; outline:none;" type="number" value="1" min="0"></td>

                                <td style="cursor:pointer">XÓA</td>
                            </tr> -->


                            <!-- <tr>
                            <td style="display: flex; align-items: center; text-align: left;"><img style="width: 70px;"
                                    src="./assets/img/iphone14.jpg" alt="">Điện thoại IPHONE 14
                            </td>
                            <td>
                                <h3>3.200.000<sup>d</sup></h3>
                            </td>
                            <td><input style="width: 30px; outline:none;" type="number" value="1" min="0"></td>
                            <td class="cart-delete" style="cursor:pointer">XÓA</td>
                        </tr> -->


                        </tbody>


                    </table>

                    <div class="container__total-price">
                        <h3 style="display: inline;">Tổng tiền</h3>
                        <h3 class="total-price" style="display: inline;">0</h3><sup>đ</sup>
                    </div>
                    <div class="cart__btn-order">
                        <button>Đặt hàng</button>
                    </div>

                </form>
            </section>
        </div>


    </div>



    <div class="footer">
        <div class="footer__grid">
            <div class="footer__row">
                <a href="">CHÍNH SÁCH BẢO MẬT</a>
                <a href="">QUY CHẾ HOẠT ĐỘNG</a>
                <a href="">CHÍNH SÁCH VẬN CHUYỂN</a>
                <a href="">CHÍNH SÁCH TRẢ HÀNG VÀ HOÀN TIÊN</a>

            </div>

            <div style="padding:2px 0" class="footer__row">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>

            <div class="footer__text">
                <h6>Địa chỉ: Tầng 4-5-6, Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba
                    Đình, Thành phố Hà Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.shopee.vn</h6>
                <h6>Chịu Trách Nhiệm Quản Lý Nội Dung: Nguyễn Đức Trí - Điện thoại liên hệ: 024 73081221 (ext 4678)
                </h6>
                <h6>Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/02/2015
                </h6>
                <h6>© 2015 - Bản quyền thuộc về Công ty TNHH Shopee</h6>
            </div>
        </div>

        <div class="footer__cart-icon">
            <p><i class="footer__iconshop fa-solid fa-cart-shopping fa-3x"></i>&nbsp &nbsp <span
                    class="cartIcon_price">0</span><sup>đ</sup></p>
        </div>

        <div class="alert alert-addCartSuccess">
            <h3>Thêm vào giỏ hàng thành công</h3>
            <a class="alert__close">&times</a>
        </div>

        <div class="alert alert-addCartDanger">
            <h3>Sản phẩm đã có trong giỏ hàng</h3>
            <a class="alert__close">&times</a>
        </div>
    </div>

    <img class="sidePicture sidePicture-right" src="https://cdn.tgdd.vn/2022/12/banner/Phai-TGDD-80x270-1.webp" alt="">
    <img class="sidePicture sidePicture-left" src="https://cdn.tgdd.vn/2022/12/banner/Phai-TGDD-80x270-1.webp" alt="">
    
 
     <div class="modal">
        <div class="modal__overlay">

        </div>

        <div class="modal__body">
        <?php 
           
           
            $select_account=mysqli_query($conn,"select * from account where username='".$username."' limit 1");
            if(mysqli_num_rows($select_account)>0)
            {
                // echo"dat";
            $fetch_account=mysqli_fetch_assoc($select_account);       
            }
           
        ?>
            <div class="modal__InfoAccount">
               <div class="InfoAccount__header">
                   <h1>THÔNG TIN TÀI KHOẢN</h1>
               </div>

               <div class="InfoAccount__body">
                    <h3 style="text-transform:uppercase">TÊN NGƯỜI DÙNG:     <?php echo $fetch_account['nickname'];  ?></h3>
                    <h3>EMAIL:  <?php echo $fetch_account['email'];  ?></h3>
                    <h3>SỐ ĐIỆN THOẠI:  <?php echo $fetch_account['phone'];  ?></h3>
                    <h3 style="text-transform:uppercase">QUYỀN TRUY CẬP:  <?php echo $fetch_account['role'];  ?> </h3>

                    <!-- nut dong form -->
                    <a onclick="closeInfoAccount()" class="closeInfoAccount_btn">&times</a>
               </div>
            
        
            </div>
        </div>
    </div>



    <script>
    <?php require_once("JS/userWeb.js");?>
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>