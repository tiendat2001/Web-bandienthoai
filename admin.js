
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
  
  //pass the id variable to the PHP script using an HTTP request (e.g. using jQuery or Fetch API)
  $.post('deleteProduct.php', {productName: productName}, function(data) {
      //truyen alert tu delete.php sang 
    alert(data);
  });
}


// nut hien form them san pham

// var btnAddForm = document.querySelector(".openAddForm")
// btnAddForm.addEventListener("click", openAddForm);
// function openAddForm(){
//   console.log("Dat")
//   var addForm = document.querySelector(".container__addProduct")
//   addForm.style.visibility="visible"
// }


// su kien dong mo form them san pham 
const openAddForm_btn = document.getElementById("openAddForm");
openAddForm_btn.addEventListener("click", function() {
    document.querySelector(".container__addProduct").style.display = "block"
})

const btn_closeAddForm = document.getElementById("closeAddForm");
btn_closeAddForm.addEventListener("click", function() {
    document.querySelector(".container__addProduct").style.display = "none"
})