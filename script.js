const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");
const products = [
  {
    id: 1,
    title: "AIR FORCE",
    price: 1199, // NOK
    colors: [
      {
        code: "black",
        img: "./Bilder/air.png",
      },
      {
        code: "darkblue",
        img: "./Bilder/air2.png",
      },
    ],
  },
  {
    id: 2,
    title: "Air Jordan",
    price: 1500, // NOK
    colors: [
      {
        code: "lightgray",
        img: "./Bilder/jordan.png",
        
      },
      {
        code: "green",
        img: "./Bilder/jordan2.png",
      },
    ],
  },
  {
    id: 3,
    title: "Air max 90",
    price: 1699, // NOK
    colors: [
      {
        code: "lightgray",
        img: "./Bilder/Airmax.png",
      },
      {
        code: "black",
        img: "./Bilder/Airmax2.jpg",
      },
    ],
  },
  {
    id: 4,
    title: "Crater",
    price: 1299, // NOK
    colors: [
      {
        code: "black",
        img: "./Bilder/crater.png",
      },
      {
        code: "lightgray",
        img: "./Bilder/crater2.png",
      },
    ],
  },
  {
    id: 5,
    title: "Zoom",
    price: 999, // NOK
    colors: [
      {
        code: "White",
        img: "./Bilder/Nike_zoom1.jpg",
      },
      {
        code: "lightblue",
        img: "./Bilder/Nike_zoom2.jpg",
      },
    ],
  },
];





let chosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductColors = document.querySelectorAll(".color");
const currentProductSizes = document.querySelectorAll(".size");
const currentProductbutton = document.querySelector(".addtocart");
menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    // Endrer de ulike slidsa
    wrapper.style.transform = `translateX(${-100 * index}vw)`;

    // Endrer det valgte produktet
    chosenProduct = products[index];

    // Endrer tekster til currentProduct
    currentProductTitle.textContent = chosenProduct.title;
    currentProductPrice.textContent = chosenProduct.price + " kr";
    currentProductImg.src = chosenProduct.colors[0].img;
    currentProductbutton.setAttribute("onclick", `addtocart('${chosenProduct.title}', ${chosenProduct.price})`);


    // Tildeler nye farger
    currentProductColors.forEach((color, index) => {
      color.style.backgroundColor = chosenProduct.colors[index].code;
    });
  });
});

currentProductColors.forEach((color, index) => {
  color.addEventListener("click", () => {
    currentProductImg.src = chosenProduct.colors[index].img;
  });
});

currentProductSizes.forEach((size, index) => {
  size.addEventListener("click", () => {
    currentProductSizes.forEach((size) => {
      size.style.backgroundColor = "white";
      size.style.color = "black";
    });
    size.style.backgroundColor = "black";
    size.style.color = "white";
  });
});

const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");


function handleClick() {
  payment.style.display = "flex";
}

productButton.addEventListener("click", handleClick);

close.addEventListener("click", () => {
  payment.style.display = "none";
});

// Kode for FAQ side //
function toggleAnswer(id) {
  var answer = document.getElementById("answer" + id);
  if (answer.style.display === "none") {
    answer.style.display = "block";
  } else {
    answer.style.display = "none";
  }
}


// Kode for Counting av produkter //

function updateCartCount(){
  const cartCount = document.getElementById("cartCount");
  const cartItems = localStorage.getItem("lagretHandlekurv") || ""  ;
  let cartCountLocal = localStorage.getItem("counting");
  let cartCountInt = parseInt(cartCountLocal);

  cartCount.textContent = cartCountInt; // Oppdaterer telleren med antall produkter 
  

}

//Oppdaterer telleren ved lasting av siden
updateCartCount();

//Oppdaterer telleren hver gang handlekurven endres
function updateCart() {


  updateCartCount(); // funksjonen for å oppdatere telleren
}




