<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Importerer Font Awesome ikoner -->
    <link rel="stylesheet" href="style.css"> <!-- Lenke til CSS -->
    <title>Logg inn</title> <!-- Tittelen på siden -->
</head>
<body>


<div class="off-screen-menu"> <!-- Av-skjerm-meny for mobilvisning -->
            <ul>
                <li><a href="index.php">Hjem</a></li> <!-- Element for hjem-siden -->
                <li><a href="FAQ.php">FAQ</a></li> <!-- Element for FAQ-siden -->
                <li><a href="Support.php">Få Hjelp</a></li> <!-- Element for Få Hjelp-siden -->
                <li><a href="Kundekonto.php">Min Profil</a></li> <!-- Element for Min Profil-siden -->
                <li><a href="handlekurv.php">Handlekurv</a></li> <!-- Element for Handlekurv-siden -->
                <li><a href="admin.dashboard.php"> Admin</a></li>
                <li><a href="sjekk.status.php"> sjekk status</a></li>

            </ul>
        </div>
        
        <nav> <!-- Navigasjonsmenyen -->
            <div class="ham-menu"> <!-- Hamburger-ikon for mobilvisning -->
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>



    <!-- Logg inn skjema -->
    <main>
        <div class="login-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form"> <!-- Skjemaelement -->
                <h2 class ="h2-3">Logg Inn</h2> <!-- Overskrift for innloggingsskjemaet -->
                <label for="brukernavn">Brukernavn:</label> <!-- Etikett for brukernavn-inndatafelt -->
                <input type="text" id="brukernavn" name="brukernavn" placeholder="Brukernavn" required><br/> <!-- Brukernavn-inndatafelt -->
                <label for="passord">Passord:</label> <!-- Etikett for passord-inndatafelt -->
                <input type="password" id="passord" name="passord" placeholder="Passord" required><br/> <!-- Passord-inndatafelt -->
                <button type="submit">Logg Inn</button><br/> <!-- Knapp for å sende inn logindata -->
                <a href="Registrer_deg.php"> Ikke en kunde? Registrer her</a> <!-- Lenke for å registrere en ny konto -->
                <?php
                    // Start økten for lagring av brukerdata
                    session_start();
                    // Inkluderer koblingen til databasen
                    include "db.connect.php";
    
                    // Sjekk om skjemaet er sendt
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Funksjon for å validere skjemadata
                        function validate($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        // Hent og validere brukernavn og passord fra skjemaet
                        $brukernavn = validate($_POST['brukernavn']);
                        $passord = validate($_POST['passord']);

                        // Sjekke om brukernavn eller passord er tomme
                        if (empty($brukernavn) || empty($passord)) {
                            echo "<p class='error-message'>Både brukernavn og passord er påkrevd!</p>"; // Feilmelding hvis brukernavn eller passord mangler
                        } else {
                            // Hashing av passordet
                            $hashed_password = md5($passord);

                            // SQL-spørring for å hente brukeren basert på brukernavn og passord
                            $sql = "SELECT * FROM users WHERE username='$brukernavn' AND password='$hashed_password'"; 

                            // Utføre spørringen
                            $result = mysqli_query($conn, $sql);

                            // Sjekke om brukeren ble funnet
                            if ($result && mysqli_num_rows($result) === 1) {
                                // Hente brukerdata
                                $row = mysqli_fetch_assoc($result);
                                // Lagre brukernavn og ID i økten
                                $_SESSION['brukernavn'] = $row['username'];
                                $_SESSION['id'] = $row['id'];
                                // Utgi en suksessmelding
                                echo "<p class='success-message'>Du har nå logget inn. <a href='Kundekonto.php'>Trykk her for å se Min Profil</a></p>";
                            } else {
                                // Utgi en feilmelding hvis brukeren ikke ble funnet
                                echo "<p class='error-message'>Feil brukernavn eller passord!</p>";
                            } 
                        }
                    }
                ?>
            </form>
        </div>
    </main> <!-- Slutt på hovedseksjonen -->

    <footer> <!-- Footer-seksjonen -->
        <div class="footerLeft"> <!-- Venstre del av footer -->
            <div class="footerMenu">
                <h1 class="fMenuTitle">Om Oss</h1> <!-- Overskrift for Om Oss-seksjonen -->
                <ul class="fList"> <!-- Liste for Om Oss-seksjonen -->
                    <li class="fListItem"><a href="Support.php">Få Hjelp</a></li> <!-- Element for Få Hjelp -->
                    <li class="fListItem"><a href="FAQ.php">FAQ</a></li> <!-- Element for FAQ -->
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Brukbare linker</h1> <!-- Overskrift for Brukbare linker-seksjonen -->
                <ul class="fList"> <!-- Liste for Brukbare linker-seksjonen -->
                    <li class="fListItem"><a href="Index.html">Hjem</a></li> <!-- Element for Hjem -->
                    <li class="fListItem"><a href="Opplæringsmateriell.html">Opplæringsmateriell</a></li> <!-- Element for Opplæringsmateriell -->
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Produkter</h1> <!-- Overskrift for Produkter-seksjonen -->
                <ul class="fList"> <!-- Liste for Produkter-seksjonen -->
                    <li class="fListItem">Air Force</li> <!-- Produkt - Air Force -->
                    <li class="fListItem">Air Jordan</li> <!-- Produkt - Air Jordan -->
                    <li class="fListItem">Air Max</li> <!-- Produkt - Air Max -->
                    <li class="fListItem">Crater</li> <!-- Produkt - Crater -->
                    <li class="fListItem">Zoom</li> <!-- Produkt - Zoom -->
                </ul>
            </div>
        </div>
        <div class="footerRight"> <!-- Høyre del av footer -->
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Abonner på vårt nyhetsbrev</h1> <!-- Overskrift for nyhetsbrev-seksjonen -->
                <div class="fMail"> <!-- Inndatafelt for e-postabonnement -->
                    <input type="text" placeholder="Sportify@Support.no" class="fInput"> <!-- Inndatafelt for e-post -->
                    <button class="fButton">Bli Med!</button> <!-- Knapp for å abonnere -->
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Følg Oss</h1> <!-- Overskrift for Følg Oss-seksjonen -->
                <div class="fIcons"> <!-- Ikoner for sosiale medier -->
                    <a href="https://www.facebook.com">
                        <img src="./Bilder/facebook.png" alt="Facebook" class="fIcon"> <!-- Facebook-ikon -->
                    </a>
                    <a href="https://www.twitter.com">
                        <img src="./Bilder/twitter.png" alt="Twitter" class="fIcon"> <!-- Twitter-ikon -->
                    </a>
                    <a href="https://www.instagram.com">
                        <img src="./Bilder/instagram.png" alt="Instagram" class="fIcon"> <!-- Instagram-ikon -->
                    </a>
                </div>
            </div>
            <div class="footerRightMenu">
                <span class="copyright">@Sportify. All rettigheter reservert. 2024.</span> <!-- Copyright-informasjon -->
            </div>
        </div>
    </footer> <!-- Slutten på footer-seksjonen -->

    <script src="./profil.js"></script> <!-- Lenke til JavaScript-filen -->
</body>
</html>
