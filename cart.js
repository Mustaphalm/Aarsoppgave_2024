
let sum = Number(localStorage.getItem("Sum")) || 0;
let cartCount2 = localStorage.getItem("counting");
let cartCount = parseInt(cartCount2);
if (cartCount) {  
  cartCount = localStorage.getItem("counting");
} else {
  cartCount = localStorage.setItem("counting", 0)
}


//const Air_Force = "<li> Air force kr 1199 </li> ";
const Air_Force = "<li>Air force kr 1199kr</li>"
const Jordan = "<li> Jordan kr 1500 </li> ";
const Air_Max = "<li> Air Max kr 1699 </li> ";
const Crater = "<li> Crater kr 1299 </li> ";
const Zoom = "<li> Zoom kr 999 </li> ";

document.addEventListener("DOMContentLoaded", function() {

});

let addToCartButton = document.getElementById("AIR_FORCE1");
//console.log(addToCartButton)





function showCart() {
  let cart = localStorage.getItem("lagretHandlekurv") || "";
    const cartElement = document.getElementById("cart");
   // console.log(cartElement);

    cartElement.innerHTML = cart;

    if (sum === 0) {
        cartElement.innerHTML += "<li>Handlekurven din er tom.</li>";
    } else {
        cartElement.innerHTML += "<li>Du kjøpte varer for kr " + sum + "</li>";
    }
}

function updateCart() {
    // localStorage.setItem("lagretHandlekurv", cart);
    // localStorage.setItem("Sum", sum);
    showCart();
}


function AIR_FORCE1() {
  let cart_string = localStorage.getItem("lagretHandlekurv") || "";

  // Sjekk om Air Force-skoen allerede er i handlekurven
  // if (!cart_string.includes(Air_Force)) {
    
    cart_string += " " + Air_Force;
    localStorage.setItem("lagretHandlekurv", cart_string);
    

    let cart_sum = Number(localStorage.getItem("Sum")) || 0;
    cart_sum += 1199;
    localStorage.setItem("Sum", cart_sum);
  // } else {
    // Hvis skoen allerede er i handlekurven, gjør ingenting eller gi en beskjed til brukeren
    console.log("Air Force-skoen er allerede i handlekurven.");


  }

function addtocart(skotype, pris) {
  let cartCount2Update = localStorage.getItem("counting");
  let cartCountUpdate = parseInt(cartCount2Update);
  let cart_string = localStorage.getItem("lagretHandlekurv") || "";
  cart_string += " <li>" + skotype + "</li>"
  cartCountUpdate++;
  localStorage.setItem("lagretHandlekurv", cart_string);
  localStorage.setItem("counting", cartCountUpdate);
  const cartCount = document.getElementById("cartCount");
  let cartCountInt = parseInt(cartCountUpdate);
  cartCount.textContent = cartCountInt;

    let cart_sum = Number(localStorage.getItem("Sum")) || 0;
    cart_sum += pris;
    localStorage.setItem("Sum", cart_sum);

    // Vis en bekreftelsesmelding
    alert(skotype + " er lagt til i handlekurven.");
    

   


}



function Jordan1() {
    cart += Jordan;
    sum += 1500;
    updateCart();
}

function Air_Max1() {
    cart += Air_Max;
    sum += 1699;
    updateCart();
}

function Crater1() {
    cart += Crater;
    sum += 1299;
    updateCart();
}

function Zoom1() {
    cart += Zoom;
    sum += 999;
    updateCart();
}

function emptyCart() {
  localStorage.setItem("lagretHandlekurv", "")
  localStorage.setItem("counting", 0);  
  localStorage.setItem("Sum", 0)
  location.reload()

  updateCart();
}
