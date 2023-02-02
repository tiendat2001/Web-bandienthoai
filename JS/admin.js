
// function deleteCart(){
//     var cartItem = document.querySelectorAll(".cartTbl_body tr")  
//     // lap so nut can add su kien
//     for( var i =0;i<cartItem.length;i++){
//     var deleteCartDiv= document.querySelectorAll(".product-delete")
//     deleteCartDiv[i].addEventListener("click",function(event){
//     var cartDelete= event.target
//     var cartItemDelete = cartDelete.parentElement
//     cartItemDelete.remove()
    
    
//   })
//   }
//     }


// ------------------------------------------------PHAN XOA SAN PHAM---------------------------------------

// XOA TRONG DATABASE, GUI THONG TIN DEN DELETE.PHP DE XOA
function deleteRow(productName) {
  if (confirm("Bạn có chắc chắn muốn xóa sản phẩm?")) {
    // xoa trong UI, tim nut duoc chon de xoa
    var cartItem = document.querySelectorAll(".cartTbl_body tr")  
    for( var i =0;i<cartItem.length;i++){
    var deleteCartDiv= document.querySelectorAll(".product-delete") 
    var cartDelete= event.target
    var cartItemDelete = cartDelete.parentElement
    cartItemDelete.remove()
  }
    // xoa trong database
    $.post('deleteProduct.php', {productName: productName}, function(data) {
      //truyen alert tu delete.php sang 
    alert(data);
  });
}
  
}
// ---------------------------------PHAN SUA SAN PHAM------------------------------------------------------
 // add sự kiện nút chỉnh sửa thông tin sản phẩm
function openEditFormUI(){
 
  const openEditForm_btn = document.querySelectorAll(".product-edit");
  for(var i =0;i<openEditForm_btn.length;i++){
    
    openEditForm_btn[i].addEventListener("click", function() {
    document.querySelector(".container__editProduct").style.display = "block"
  })
  }
  const closeEditForm_btn = document.getElementById("closeEditForm");
  closeEditForm_btn.addEventListener("click", function() {
      document.querySelector(".container__editProduct").style.display = "none"
  })
  
}
openEditFormUI()

function openEditForm(productName,productImage,productPrice,productType){
  // mo form edit san pham, fill thông tin các trường
  // openEditFormUI()
  document.getElementById("editForm__name").value=productName
  document.getElementById("editForm__image").value=productImage
  document.getElementById("editForm__price").value=productPrice
  document.getElementById("editForm__type").value=productType

}


// $.post('editProduct.php', {productName: productName,productImage: productImage,productPrice: productPrice,productType: productType}, function(data) {
//   //truyen alert tu delete.php sang 
// alert(data);
// });
// su kien dong mo form them san pham 
const openAddForm_btn = document.getElementById("openAddForm");
openAddForm_btn.addEventListener("click", function() {
    document.querySelector(".container__addProduct").style.display = "block"
})

const btn_closeAddForm = document.getElementById("closeAddForm");
btn_closeAddForm.addEventListener("click", function() {
    document.querySelector(".container__addProduct").style.display = "none"
})




