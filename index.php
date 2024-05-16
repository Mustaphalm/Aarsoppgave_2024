<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome ikoner -->    
    <link rel="stylesheet" href="style.css">
    <title>Sportify Store</title>

</head>
<body>

   
  

    <nav id="nav">
        <div class="navTop">
            <div class="navItem">
               <h1 class="navn">
                <a href="Kundekonto.php"><i class="fa fa-user"></i></a>
 <span class="shop-name"> Sportify Store </h1>

 </span>
           </div>

           <div class="off-screen-menu">
            <ul>
                <li><a href="index.php">Hjem</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="Support.php">Få Hjelp</a></li>
                <li><a href="Kundekonto.php">Min Profil</a></li>
                <li><a href="admin.dashboard.php"> Admin</a></li>
                <li><a href="sjekk.status.php"> sjekk status</a></li>



            </ul>
        </div>
        
        <nav>
                <div class="ham-menu">
                <span></span>
                <span></span>
                <span></span>
                </div>
            </nav>

  <div class="navItem">
                <div class="search">
                    <input type="text" placeholder="Søk..." class="searchInput">
                    <img src="./Bilder/search.png"  alt="" class="searchIcon">
                </div>
            </div>
            <div class="navItem">
               
                <a href="handlekurv.php" class="cart-link" onclick="showCart()">
                    <div class="cart-icon">&#128722;</div>
                    <div class="cart-text">Handlekurv (<span id="cartCount">0</span>)</div>
                </a>

            </div>
                
    

                <a href="Logg_inn.php" class="loginButton"><i class="fas fa-sign-in-alt"></i>Logg inn</a>
                <a href="Registrer_deg.php" class="CustomerButton"><i class="fas fa-user-plus"></i> Bli Kunde </a>                
         
            
        </div>
        <div class="navBottom">
            <h3 class="menuItem">AIR FORCE</h3>
            <h3 class="menuItem">JORDAN</h3>
            <h3 class="menuItem">AIR MAX</h3>
            <h3 class="menuItem">CRATER</h3>
            <h3 class="menuItem">ZOOM</h3>
           
        </div>

  

    </nav>
    <div class="slider">
        <div class="sliderWrapper">
            <div class="sliderItem">
                <img src="./Bilder/air.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>    
                <h1 class="sliderTitle">AIR FORCE</br> NY</br> SESONG</h1>
                <h2 class="sliderPrice">1199 kr</h2>
                <a href="#product">
                    <button class="buyButton">Kjøp Nå!</button>
                   

                </a>
            </div>
            <div class="sliderItem">
                <img src="./Bilder/jordan.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">AIR JORDAN</br> NY</br> SESONG</h1>
                <h2 class="sliderPrice">1500 KR</h2>
                <a href="#product">
                    <button class="buyButton">Kjøp Nå!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./Bilder/Airmax.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Airmax 90</br> NY</br> Modell</h1>
                <h2 class="sliderPrice">1699 kr</h2>
                <a href="#product">
                    <button class="buyButton">Kjøp Nå!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./Bilder/crater.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">CRATER</br> NY</br> SESONG</h1>
                <h2 class="sliderPrice">1299 kr</h2>
                <a href="#product">
                    <button class="buyButton">Kjøp Nå!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./Bilder/Zoom_sko_for_slider.jpg" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">ZOOM</br> NY</br> SESONG</h1>
                <h2 class="sliderPrice">999 kr</h2>
                <a href="#product">
                    <button class="buyButton">Kjøp Nå!</button>
                </a>
            </div>
        </div>
    </div>
   
    <div class="features">
        <div class="feature">
            <img src="./Bilder/shipping.png" alt="" class="featureIcon">
            <span class="featureTitle">Gratis Frakt</span>
            <span class="featureDesc">Gratis frakt over hele norden på alle bestillinger.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./Bilder/return.png" alt="">
            <span class="featureTitle">30 Dager Åpent Kjøp</span>
            <span class="featureDesc">Returner enkelt med en refrusjon på 14 dager.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./Bilder/gift.png" alt="">
            <span class="featureTitle">GAVE KORT</span>
            <span class="featureDesc">Kjøp gave kort og bruk kupongkoder lett.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./Bilder/contact.png" alt="">
            <span class="featureTitle">KONTAKT OSS!</span>
            <span class="featureDesc">Sportify@Support.no eller 99 34 34 67</span>
        </div>
    </div>

    <div class="product" id="1">
        <img src="./Bilder/air.png" alt="" class="productImg">
        <div class="productDetails">
            <h1 class="productTitle">AIR FORCE</h1>
            <h2 class="productPrice">1199 kr</h2>
            <p class="productDesc">
            </p>
            <div class="colors">
                <div class="color" style="background-color: black;"></div>
                <div class="color" style="background-color:  rgb(13, 3, 87);"></div> 
            </div>
            <div class="sizes">
                <div class="size">43</div>
                <div class="size">44</div>
                <div class="size">45</div>
            </div>
            <button class="productButton">Kjøp Nå!</button>
            <button onclick="addtocart('Air force', 1500)" class="addtocart">Legg til i handlekurven</button>
           
            <div class="add-to-cart-container"></div>

        </div>  
        


        <div class="payment">
            <h1 class="payTitle">Personlig Informasjon</h1>
            <label>Fornavn og Etternavn</label>
            <input type="text" placeholder="John Doe" class="payInput">
            <label>Telefon nummer </label>
            <input type="text" placeholder="+47 234 5678" class="payInput">
            <label>Adresse</label>
            <input type="text" placeholder="Galgeberg 29a" class="payInput">
            <h1 class="payTitle">Kort Infromasjon</h1>
            <div class="cardIcons">
                <img src="./Bilder/visa.png" width="40" alt="" class="cardIcon">
                <img src="./Bilder/master.png" alt="" width="40" class="cardIcon">
            </div>
            <input type="password" class="payInput" placeholder="Kort Nummer">
            <div class="cardInfo">
                <input type="text" placeholder="mm" class="payInput sm">
                <input type="text" placeholder="yyyy" class="payInput sm">
                <input type="text" placeholder="cvv" class="payInput sm">
            </div>
            <button class="payButton">Kasse!</button>
            <span class="close">X</span>
        </div>
    </div>
    <div class="gallery">
        <div class="galleryItem">
            <h1 class="galleryTitle">Vær Deg Selv!</h1>
            <img src="https://images.pexels.com/photos/9295809/pexels-photo-9295809.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
        </div>
        <div class="galleryItem">
            <img src="https://images.pexels.com/photos/1040427/pexels-photo-1040427.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
            <h1 class="galleryTitle">Dette er den første dagen i ditt nye liv</h1>
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">Alt Er Mulig!</h1>
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
        </div>
    </div>
    <div class="newSeason">
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/4753986/pexels-photo-4753986.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">Nye Ankomster For Vinter</h3>
            <h1 class="nsTitle">Ny Sesong</h1>
            <h1 class="nsTitle">Ny Kolekksjon</h1>
            <a href="#nav">
                <button class="nsButton">VELG DIN STYLE</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
    </div>
    <footer>
        <div class="footerLeft">
            <div class="footerMenu">
                <h1 class="fMenuTitle">Om Oss</h1>
                <ul class="fList">
                   
                    <li class="fListItem"><a href="Support.php">Få Hjelp</a></li>
                      <li class="fListItem"><a href="FAQ.php">FAQ</a></li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Brukbare linker</h1>
                <ul class="fList">
                    <li class="fListItem"><a href="Index.php">Hjem</a></li>
                    <li class="fListItem"><a href="Opplæringsmateriell.html">Opplærlingsmateriell</a></li>
                    
              
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Produkter</h1>
                <ul class="fList">
                    <li class="fListItem">Air Force</li>
                    <li class="fListItem">Air Jordan</li>
                    <li class="fListItem">Air Max</li>
                    <li class="fListItem">Crater</li>
                    <li class="fListItem">Zoom</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Abonner på vårt nyhetsbrev</h1>
                <div class="fMail">
                    <input type="text" placeholder="Sportify@Support.no" class="fInput">
                    <button class="fButton">Bli Med!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Følg Oss</h1>
                <div class="fIcons">

                    <a href="https://www.facebook.com">
                        <img src="./Bilder/facebook.png" alt="Facebook" class="fIcon">
                    </a>
                    
                    <a href="https://www.twitter.com">
                        <img src="./Bilder/twitter.png" alt="Twitter" class="fIcon">
                    </a>
                    
                    <a href="https://www.instagram.com">
                        <img src="./Bilder/instagram.png" alt="Instagram" class="fIcon">
                    </a>
                    
            </div>
            <div class="footerRightMenu">
                <span class="copyright">@Sportify. All rettigheter reservert. 2024.</span>
            </div>
        </div>
    </footer>

    <script src="./script.js"></script>
    <script src="./profil.js"></script>
   <script src="./cart.js"></script>

</body>
</html>
