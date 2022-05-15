var items = new Set();

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}
function ready() {
  // existShoppingCart();
  var removeCartItemButtons = document.getElementsByClassName("btn-danger");
  for (var i = 0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i];
    button.addEventListener("click", removeCartItem);
  }

  var quantityInputs = document.getElementsByClassName("cart-quantity-input");
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

  var addToCartButtons = document.getElementsByClassName("shop-item-button");
  for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i];
    button.addEventListener("click", addToCartClicked);
  }

  document
    .getElementsByClassName("btn-purchase")[0]
    .addEventListener("click", purchaseClicked);
}

function purchaseClicked() {
  var user = localStorage.getItem('name');
  if (user === "logined") {
    if(getTotal() === '$0') {
      alert('There is no pizza in your shopping cart!');
      return;
    }
    var conf = confirm("confirm the purchase " + getTotal() + "?");
    if (conf && getTotal() !== 0) {
      alert("Thank you for the purchase");
      var cartItems = document.getElementsByClassName("cart-items")[0];
      while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild);
      }
      updateCartTotal();
    }

    
  } else {
    window.location = './login.php';
  }
}

function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.parentElement.remove();
  updateCartTotal();
}

function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartTotal();
}
function addToCartClicked(event) {
  var button = event.target;
  var shopItem = button.parentElement.parentElement;
  var title = shopItem.getElementsByClassName("shop-item-title")[0].innerText;
  var price = shopItem.getElementsByClassName("shop-item-price")[0].innerText;
  var imageSrc = shopItem.getElementsByClassName("shop-item-image")[0].src;
  addItemToCart(title, price, imageSrc);
  console.log(items);
  updateCartTotal();
}



function addItemToCart(title, price, imageSrc) {
  var islogined = localStorage.getItem('name');
  if(islogined !== 'logined') {
    window.location = './login.php';
  }
  var cartRow = document.createElement("div");
  cartRow.classList.add("cart-row");
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var cartItemNames = cartItems.getElementsByClassName("cart-item-title");
  for (var i = 0; i < cartItemNames.length; i++) {
    if (cartItemNames[i].innerText == title) {
      //alert("This item is already added to the cart");
      var quan = document.getElementsByClassName('cart-quantity-input')[i];
      var val = quan.value;
      val++;
      quan.setAttribute('value', val);
      return;
    }
  }
  var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`;
  cartRow.innerHTML = cartRowContents;
  cartItems.append(cartRow);
  cartRow
    .getElementsByClassName("btn-danger")[0]
    .addEventListener("click", removeCartItem);
  cartRow
    .getElementsByClassName("cart-quantity-input")[0]
    .addEventListener("change", quantityChanged);
    // var item = [imageSrc, title, price];
    // items.add(item);
    //console.log(items[0]);
    // localStorage.removeItem('cart');
    // localStorage.setItem('cart', items);
}

// function existShoppingCart() {
//   var itemscart = JSON.parse(localStorage.getItem('cart'));
//   var cartRow = document.createElement("div");
//   cartRow.classList.add("cart-row");
//   var cartItems = document.getElementsByClassName("cart-items")[0];
//   for(var element of itemscart) {
//     var text = `
//     <div class="cart-item cart-column">
//         <img class="cart-item-image" src="${element[0]}" width="100" height="100">
//         <span class="cart-item-title">${element[1]}</span>
//     </div>
//     <span class="cart-price cart-column">${element[2]}</span>
//     <div class="cart-quantity cart-column">
//         <input class="cart-quantity-input" type="number" value="1">
//         <button class="btn btn-danger" type="button">REMOVE</button>
//     </div>`;
//     cartRow.innerHTML = text;
//     cartItems.append(cartRow);
//     cartRow
//       .getElementsByClassName("btn-danger")[0]
//       .addEventListener("click", removeCartItem);
//     cartRow
//       .getElementsByClassName("cart-quantity-input")[0]
//       .addEventListener("change", quantityChanged);
//   }
// }

function updateCartTotal() {
  var cartItemContainer = document.getElementsByClassName("cart-items")[0];
  var cartRows = cartItemContainer.getElementsByClassName("cart-row");
  var total = 0;
  for (var i = 0; i < cartRows.length; i++) {
    var cartRow = cartRows[i];
    var priceElement = cartRow.getElementsByClassName("cart-price")[0];
    var quantityElement = cartRow.getElementsByClassName(
      "cart-quantity-input"
    )[0];
    var price = parseFloat(priceElement.innerText.replace("$", ""));
    var quantity = quantityElement.value;
    total = total + price * quantity;
  }
  total = Math.round(total * 100) / 100;
  document.getElementsByClassName("cart-total-price")[0].innerText =
    "$" + total;
  // localStorage.removeItem('cart');
  // localStorage.setItem('cart', items);
}

function getTotal() {
  return document.getElementsByClassName("cart-total-price")[0].innerText
}


// function getCartRow() {
//   return cartItemContainer.getElementsByClassName("cart-row").length;
// }

// var removeCartItemButtons = document.getElementsByClassName("btn-danger");
// console.log(removeCartItemButtons);
// for (var i = 0; i < removeCartItemButtons.length; i++) {
//   var button = removeCartItemButtons[i];
//   button.addEventListener("click", function (event) {
//     var buttonClicked = event.target;
//     buttonClicked.parentElement.parentElement.remove();
//     updateCartTotal();
//   });
// }
// function updateCartTotal() {
//   var cartItemContainer = document.getElementsByClassName("cart-items");
//   var cartRows = cartItemContainer.getElementsByClassName("cart-row");
//   for (var i = 0; i < cartRows.length; i++) {
//     var cartRow = cartRows[i];
//     var priceElement = cartRow.getElementsByClassName("cart-price")[0];
//     var quantityElement = cartRow.getElementsByClassName(
//       "cart-quantity-input"
//     )[0];
//     var priceElement = cartRow.getElementsByClassName("cart-price")[0];
//   }
// }
// {/* <script src='script.js'>

// </script> */}