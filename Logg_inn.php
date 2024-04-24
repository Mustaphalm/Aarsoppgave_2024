<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome ikoner -->    
    <link rel="stylesheet" href="style.css">
    <title>Logg inn</title>
</head>
<body>


<div class="off-screen-menu">
            <ul>
                <li><a href="index.php">Hjem</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="Support.php">Få Hjelp</a></li>
                <li><a href="Kundekonto.php">Min Profil</a></li>
                <li><a href="handlekurv.php"> Handlekruv</a></li>


            </ul>
        </div>
        
        <nav>
            <div class="ham-menu">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>



    <!--  logg inn form -->
    <main>
        <div class="login-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
            <!-- 
    Bruker htmlspecialchars for å sikre at eventuell HTML eller JavaScript-kode i $user_input blir konvertert til tilsvarende HTML-elementer.
    Dette beskytter mot potensielle dataangrep ved å forhindre uønsket utførelse av skadelig kode på nettsiden.
-->
                <!-- Overskrift for innloggingsformularet -->
                <h2 class ="h2-3">Logg Inn</h2>
                <!-- Inndatafelt for brukernavn -->
                <label for="brukernavn">Brukernavn:</label>
                <input type="text" id="brukernavn" name="brukernavn" placeholder="Brukernavn" required><br/>

                <!-- Inndatafelt for passord -->
                <label for="passord">Passord:</label>
                <input type="password" id="passord" name="passord" placeholder="Passord" required><br/>

                <!-- Knapp for å sende inn logindata -->
                <button type="submit">Logg Inn</button><br/>

                <a href="Registrer_deg.php"> Ikke en kunde? Registrer her</a>

                      <!-- Her slutter logg inn form-->  
                      


                <?php
                    // Starte økten for å lagre brukerdata
                    session_start();
                    // Inkludere koblingen til databasen
                    include "db.connect.php";
    
                    // Sjekke om skjemaet er sendt
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Funksjon for å validere skjemadata
                        function validate($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        // Hente og validere brukernavn og passord fra skjemaet
                        $brukernavn = validate($_POST['brukernavn']);
                        $passord = validate($_POST['passord']);

                        // Sjekke om brukernavn eller passord er tomme
                        if (empty($brukernavn) || empty($passord)) {
                            echo "<p class='error-message'>Både brukernavn og passord er påkrevd!</p>";
                        } else {
                            // Hashing av passordet
                            $hashed_password = md5($passord);

                            // SQL-spørring for å hente brukeren basert på brukernavn og passord
                            $sql = "SELECT * FROM users WHERE username='$brukernavn' AND password='$hashed_password'"; 
                             //echo $sql;
                            // Utfører spørringen
                            $result = mysqli_query($conn, $sql);

                            // Sjekker om brukeren ble funnet
                            if ($result && mysqli_num_rows($result) === 1) {
                                // Henter brukerdata
                                $row = mysqli_fetch_assoc($result);
                                // Lagrer brukernavn og ID i økten
                                $_SESSION['brukernavn'] = $row['username'];
                                $_SESSION['id'] = $row['id'];
                                // Utgive en suksessmelding

                                echo "<p class='success-message'>Du har nå logget inn. <a href='Kundekonto.php'>Trykk her for å se Min Profil</a></p>";
                            } else {
                                // Utgive en feilmelding hvis brukeren ikke ble funnet
                                echo "<p class='error-message'>Feil brukernavn eller passord!</p>";
                            } 
                        }
                    }
                ?>
            </form>
        </div>
    </main>



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
                    <li class="fListItem"><a href="Index.html">Hjem</a></li>
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

    <script src="./profil.js"></script>
</body>
</html>