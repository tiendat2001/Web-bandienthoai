let slideIndex = 0;
showSlides();
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
  var sidePicture = document.querySelectorAll(".sidePicture")
  // khi keo thanh dc 20px
  const maxHeight = document.body.scrollHeight;
  if ( document.documentElement.scrollTop >  maxHeight * 0.4) {
    sidePicture[0].style.display = "none";
    sidePicture[1].style.display = "none";
  } else {
    sidePicture[0].style.display = "block";
    sidePicture[1].style.display = "block";
  }
}

// var sidePicture = document.querySelector(".sidePicture-right")
// function onScroll(event) {
//   const current = document.documentElement.scrollTop;
//   const maxHeight = document.body.scrollHeight;
  
//   // if current position is more than 80% of document height
//   if (current > maxHeight * 0.8) {
//     sidePicture.style.display = "none";
//   } else {
//     sidePicture.style.display = "block";
//   }
// }

// window.addEventListener('scroll', event => onScroll(event));


function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides"); 
  // let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" active", "");
  // }
  slides[slideIndex - 1].style.display = "block";
  // dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}


// -------------------------PHAN NUT THEM VAO GIO HANG --------------------------------

// lay cac nut them vao gio hang
const product = document.querySelector(".product")
const btn_addcart = product.querySelectorAll("button")



// duyet qua cac nut, moi nut add event 
// su kien khi bam nut them vao gio
btn_addcart.forEach(function(button,index){
  button.addEventListener("click",function(){
    // chon nut da duoc click
    var btnItem = event.target
    var product = btnItem.parentElement
   
    var productImg= product.querySelector("img").src
    var productPrice = product.querySelector(".product__price").innerText.replace('<sup>đ</sup>', '')
    var productName = product.querySelector(".product__name").innerHTML
    // console.log(productName)

    // console.log(productName,productImg,productPrice)
    addcart(productName,productImg,productPrice)

  })
})


  // xoa san pham

// function deleteCart(){
//   var cartItem = document.querySelectorAll(".cartTbl_body tr")  
//   for( var i =0;i<cartItem.length;i++){
//   console.log(cartItem.length)
//   var deleteCartDiv= document.querySelectorAll(".cart-delete")
//   deleteCartDiv[i].addEventListener("click",function(event){
//   var cartDelete= event.target
//   var cartItemDelete = cartDelete.parentElement
  
//   console.log(cartItemDelete)
//   cartItemDelete.remove()
  
  
// })
// }
//   }



function addcart(productName,productImg,productPrice){
  // row cần thêm vào 
  var addtr = document.createElement("tr")
  trcontent='<td class="td__product__img-name"> <img src="'+productImg+'" alt=""><span class="td__product__name">'+ productName +'</span></td><td>  <h3 style="display: inline;" class="product__price">'+productPrice+'</h3></td><td><input style="width: 30px; outline:none;" type="number" value="1" min="0"></td><td class="cart-delete" style="cursor:pointer">XÓA</td> '
  addtr.innerHTML= trcontent
  // check xem san pham da co trong gio hang chua
  var cartItem = document.querySelectorAll(".cartTbl_body tr")
  for( var i =0;i<cartItem.length;i++){
    var cartItemName = cartItem[i].querySelector(".td__product__name").innerHTML
    
    // sản phẩm có trong giỏ hàng
    if(cartItemName== productName){
      // hiện pop up (mặc định ẩn)
      var SuccessAddCart = document.querySelector(".alert-addCartDanger")
      SuccessAddCart.style.visibility="visible"
      
    // sau 3 giây tiếp tục ẩn pop up 
      setTimeout( function AlertAddCartDanger(){
      document.querySelector(".alert-addCartDanger").style.visibility="hidden"
  }, 3000)

      return
    }
  }
  
  // sản phẩm chưa có sẵn trong giỏ hàng
  // them row vao bang (thêm sản phẩm vào giỏ hàng)
  var cartTbl=document.querySelector(".cartTbl_body")
  cartTbl.appendChild(addtr)

  // hien thong bao thêm giỏ hàng thành công 
  var SuccessAddCart = document.querySelector(".alert-addCartSuccess")
  SuccessAddCart.style.visibility="visible"

  setTimeout( function AlertAddCartSuccess(){
    document.querySelector(".alert-addCartSuccess").style.visibility="hidden"
  }, 3000)


  // moi lan them vao se tinh lai tong tien hang, add su kien nut xoa, add su kien thay doi so luong
  totalPrice()
  deleteCart()
  inputChange()
}

// chinh gia tien khi thay doi gio hang
function totalPrice(){
  var cartItem = document.querySelectorAll(".cartTbl_body tr")
  var sumPrice = 0
  for( var i =0;i<cartItem.length;i++){
    var priceDiv = cartItem[i].querySelector(".product__price").innerHTML.replaceAll('.','')
    var quantityDiv = cartItem[i].querySelector("input").value
     sumPrice = sumPrice + parseFloat(priceDiv)*quantityDiv
  
  }
  // console.log(sum.toLocaleString('de-DE'))
  // hien tong tien gia
  var totalPriceDiv = document.querySelector(".total-price")
  var cartIconDiv = document.querySelector(".cartIcon_price")
  cartIconDiv.innerHTML=sumPrice.toLocaleString('de-DE')
  totalPriceDiv.innerHTML=sumPrice.toLocaleString('de-DE')
  
}



// add su kien nut xoa vao tat ca gio hang
function deleteCart(){
  var cartItem = document.querySelectorAll(".cartTbl_body tr")  
  // lap so nut can add su kien
  for( var i =0;i<cartItem.length;i++){
  var deleteCartDiv= document.querySelectorAll(".cart-delete")
  deleteCartDiv[i].addEventListener("click",function(event){
  var cartDelete= event.target
  var cartItemDelete = cartDelete.parentElement
  cartItemDelete.remove()
  totalPrice()
  
})
}
  }

function inputChange(){
  var cartItem = document.querySelectorAll(".cartTbl_body tr")  
  // lap so nut can add su kien
  for( var i =0;i<cartItem.length;i++){
    var inputDiv = document.querySelectorAll("input")
    inputDiv[i].addEventListener("change",function(event){
      totalPrice()
    })
  }
}


// chuyển link thông tin sản phẩm khi bấm vào sản phẩm
function getDetailInfo(productName){
  console.log(productName)
  $.post('ProductInfo.php', {productName: productName}, function(data) {
  // location.href="http://localhost/Web-bandienthoai/ProductDetail.php";
  window.open('http://localhost/Web-bandienthoai/ProductDetailWeb.php', '_blank');


});
} 


// ẩn hiện giỏ hàng
const cartIcon = document.querySelector(".footer__iconshop")
cartIcon.addEventListener("click",function(){
  
  document.querySelector(".container__cart").style.right=0
  // setTimeout(myFunction, 3000)
  
  
})

const cartClose = document.querySelector(".cart__closeForm")
cartClose.addEventListener("click",function(){
  document.querySelector(".container__cart").style.right="-100%"
  
})
