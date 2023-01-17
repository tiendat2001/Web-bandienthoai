
// PHAN XOA SAN PHAM

// XOA TRONG UI
deleteCart();
function deleteCart(){
    var cartItem = document.querySelectorAll(".cartTbl_body tr")  
    // lap so nut can add su kien
    for( var i =0;i<cartItem.length;i++){
    var deleteCartDiv= document.querySelectorAll(".product-delete")
    deleteCartDiv[i].addEventListener("click",function(event){
    var cartDelete= event.target
    var cartItemDelete = cartDelete.parentElement
    cartItemDelete.remove()
    
    
  })
  }
    }
  

// XOA TRONG DATABASE, GUI THONG TIN DEN DELETE.PHP DE XOA
function deleteRow(productName) {
  alert("productName")
  //pass the id variable to the PHP script using an HTTP request (e.g. using jQuery or Fetch API)
  $.post('deleteProduct.php', {productName: productName}, function(data) {
      //truyen alert tu delete.php sang 
    alert(data);
  });
}