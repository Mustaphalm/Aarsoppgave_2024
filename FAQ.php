<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Inkluderer Font Awesome ikoner -->
    <link rel="stylesheet" href="style.css">
    <title>FAQ</title>
</head>
<body>

<div class="wrapper">
  <h1>Ofte stilte spørsmål (FAQ)</h1>

  <!-- FAQ-spørsmål og svar -->
  <div class="faq">
    <button class="accordion">Hvordan kan jeg bestille sko fra nettbutikken deres?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Du kan enkelt bestille sko fra vår nettbutikk ved å legge dem til handlekurven og fullføre betalingen ved utsjekking.</p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">Hva er deres leveringstid?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Leveringstiden kan variere avhengig av din plassering, men vi beregner ca 1-4 virkedager.</p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">Har dere gavekort tilgjengelig for kjøp?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Gavekort er dessverre ikke tilgjengelig hos oss, men vi håper på å få det i løpet av sommeren da det blir enda flere kunder som handler hos oss</p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">Hvilke betalingsmetoder godtar dere?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Vi godtar Mastercard og Visa for øyeblikket.</p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">Hva gjør jeg hvis skoene blir ødelagt eller har feil etter kjøpet?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Hvis angretten fortsatt gjelder, har du mulighet å kontakte oss angående det som har skjedd. Da sender vi enten et nytt par eller pengene tilbake hvis det blir godkjent fra oss.</p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">Hvordan kan jeg ta vare på og vedlikeholde skoene mine?<i class="fas fa-plus"></i></button>
    <div class="panel">
      <p>Det anbefales å vaske skoene 1 gang i uka. Gjerne bruk en klut som er våt og tørk forsiktig rundt skoen. Ikke bruk vaskemaskinen ettersom at dette kan medføre skade på skoen</p>
    </div>
  </div>

</div>

<!-- Footer -->
<footer>
    <div class="footerLeft">
        <!-- Om Oss seksjon -->
        <div class="footerMenu">
            <h1 class="fMenuTitle">Om Oss</h1>
            <ul class="fList">
                <li class="fListItem"><a href="Support.php">Få Hjelp</a></li>
                <li class="fListItem"><a href="FAQ.php">FAQ</a></li>
            </ul>
        </div>
        <!-- Brukbare linker seksjon -->
        <div class="footerMenu">
            <h1 class="fMenuTitle">Brukbare linker</h1>
            <ul class="fList">
                <li class="fListItem"><a href="Index.php">Hjem</a></li>
                <li class="fListItem"><a href="Opplæringsmateriell.html">Opplærlingsmateriell</a></li>
            </ul>
        </div>
        <!-- Produkter seksjon -->
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
        <!-- Nyhetsbrev seksjon -->
        <div class="footerRightMenu">
            <h1 class="fMenuTitle">Abonner på vårt nyhetsbrev</h1>
            <div class="fMail">
                <input type="text" placeholder="Sportify@Support.no" class="fInput">
                <button class="fButton">Bli Med!</button>
            </div>
        </div>
        <!-- Sosiale medier seksjon -->
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
        </div>
        <!-- Kopirettigheter -->
        <div class="footerRightMenu">
            <span class="copyright">@Sportify. All rettigheter reservert. 2024.</span>
        </div>
    </div>
</footer>

<!-- JavaScript-fil -->
<script src="./script.js"></script>
   
</body>
</html>
