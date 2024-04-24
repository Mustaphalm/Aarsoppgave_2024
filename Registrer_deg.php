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




    
      <!-- Her starter registreringsformen -->
<main>
    <div class="registration-container">
        <h2>Bli Kunde</h2>
        <!-- Registreringsskjema -->
        <form class="registration-form" method="post">
            <label for="fornavn">Fornavn:</label>
            <input type="text" id="fornavn" name="fornavn" placeholder="Fornavn" required><br/>

            <label for="etternavn">Etternavn:</label>
            <input type="text" id="etternavn" name="etternavn" placeholder="Etternavn" required><br/>

            <label for="brukernavn">Brukernavn:</label>
            <input type="text" id="brukernavn" name="brukernavn" placeholder="Velg et brukernavn" required><br/>

            <label for="passord">Passord:</label>
            <input type="password" id="passord" name="passord" placeholder="Velg et passord" required><br/>

            <button type="submit">Registrer deg</button><br/>

            <a href="Logg_inn.php"> Allerede en konto? Logg inn her</a>

            <?php
            // Inkluderer databasekoblingen
            include "db.connect.php"; // Juster stien ved behov

            // Håndterer registreringslogikk når skjemaet sendes
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Funksjon for validering av inndata
                function validate($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                // Valider og rens inndata
                $fornavn = validate($_POST['fornavn']);
                $etternavn = validate($_POST['etternavn']);
                $brukernavn = validate($_POST['brukernavn']);
                $passord = validate($_POST['passord']);

                // Sjekk om alle påkrevde felt er oppgitt
                if (empty($fornavn) || empty($etternavn) || empty($brukernavn) || empty($passord)) {
                    echo "Alle felt er påkrevd!";
                    exit();
                }

                // Hashing av passordet
                $hashed_password = md5($passord);

                // Sjekk om brukernavnet allerede eksisterer ved hjelp av en forberedt uttalelse
                $check_username_query = "SELECT * FROM users WHERE username=?";
                $stmt_check = mysqli_prepare($conn, $check_username_query);

                if ($stmt_check === false) {
                    echo "Feil i forberedt uttalelse: " . mysqli_error($conn);
                    exit();
                }

                mysqli_stmt_bind_param($stmt_check, "s", $brukernavn);
                mysqli_stmt_execute($stmt_check);
                mysqli_stmt_store_result($stmt_check);

                if (mysqli_stmt_num_rows($stmt_check) > 0) {
                    echo "Brukernavnet eksisterer allerede! Prøv et annet.";
                } else {

                    // Setter inn en ny bruker i databasen ved hjelp av en forberedt uttalelse
                    $insert_user_query = "INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
                    $stmt_insert = mysqli_prepare($conn, $insert_user_query);

                    if ($stmt_insert === false) {
                        echo "Feil i forberedt uttalelse: " . mysqli_error($conn);
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt_insert, "ssss", $fornavn, $etternavn, $brukernavn, $hashed_password);

                    if (mysqli_stmt_execute($stmt_insert)) {
                        echo "Registrering vellykket! Du kan nå <a href='Logg_inn.php'>logge inn</a>";

                        // Redirect brukeren til en annen side hvis ønskelig
                    } else {
                        echo "Registrering feilet. Prøv igjen senere. " . mysqli_stmt_error($stmt_insert);
                    }

                    mysqli_stmt_close($stmt_insert);
                }

                mysqli_stmt_close($stmt_check);
            }

            // Lukker databaseforbindelsen
            mysqli_close($conn);
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
