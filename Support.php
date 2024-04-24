


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome ikoner -->    
    <title>Support - Sportify Store</title>
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
          

    <header class="support-header">
        <h1>Velkommen til Sportify Store Kundeservice</h1>
    </header>

    <script>
    function changeButtonText(form) {
        var button = form.querySelector("button[type='submit']");
        button.textContent = "Takk, din tilbakemelding er mottatt!";
    }

    function submitForm(event) {
        event.preventDefault(); // Hindrer standardoppførselen til skjemaet (sideoppdatering)
        var form = event.target; // Henter skjemaet som ble sendt
        var button = form.querySelector("button[type='submit']");
        var formData = new FormData(form); // Henter skjemadataene

        // Sender skjemadataene asynkront via AJAX
        fetch(form.action, {
            method: form.method,
            body: formData
        }).then(response => {
            if (response.ok) {
                // Hvis responsen er OK, oppdaterer du sendeknappen til bekreftelsesmeldingen
                changeButtonText(form);
            } else {
                // Hvis responsen er ikke-OK, håndter feilen på en passende måte
                console.error("Feil ved innsending av skjema:", response.statusText);
            }
        }).catch(error => {
            console.error("Feil ved innsending av skjema:", error);
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("#feedback form");
        form.addEventListener("submit", submitForm); // Lytter etter skjemainnsending
    });
</script>


    <section id="faq">
        <h2>Ofte stilte spørsmål</h2>
        <p>Her finner du svar på noen vanlige spørsmål:</p>
        <ul>
            <li>Hvordan kan jeg returnere en vare?</li>
            <li>Hvordan kan jeg spore min bestilling?</li>
            <li>Hvordan kan jeg kontakte kundeservice?</li>
            <!-- Legg til flere spørsmål og svar etter behov -->
        </ul>
    </section>

    <section id="contact">
        <h2>Kontakt Oss</h2>
        <p>Har du spørsmål eller bekymringer? Ta kontakt med vår kundeservice:</p>
        <ul>
            <li>Telefon: 99 34 34 67</li>
            <li>E-post: Sportify@Support.no</li>
        </ul>
        <p>Vår kundeservice er tilgjengelig mandag til fredag fra kl. 09:00 til 17:00.</p>
    </section>

    <section id="returns">
        <h2>Retur- og bytterett</h2>
        <p>Vi tilbyr en problemfri retur- og bytteprosess. Her er informasjonen du trenger:</p>
        <ul>
            <li>Alle varer kan returneres innen 30 dager etter kjøpet.</li>
            <li>Varene må være ubrukte og i original stand.</li>
            <li>Kunden er ansvarlig for returfrakt.</li>
            <!-- Legg til mer detaljer om retur- og byttepolitikken etter behov -->
        </ul>
    </section>


    <section id="troubleshoot">
        <h2>Feilsøking og vedlikehold</h2>
        <p>Har du problemer med produktet ditt? Her er noen tips for feilsøking og vedlikehold:</p>
        <ul>
            <li>Sjekk produktets bruksanvisning for feilsøkingstips.</li>
            <li>Rengjør produktet regelmessig for å opprettholde ytelsen.</li>
            <li>Kontakt kundeservice hvis problemet vedvarer.</li>
            <!-- Legg til flere feilsøkingstips og vedlikeholdsråd etter behov -->
        </ul>
    </section>

    <section id="feedback">
    <h2>Gi tilbakemelding</h2>
    <p>Vi setter pris på din tilbakemelding! Vennligst del dine tanker og erfaringer med oss:</p>
    <form action="Support.php" method="POST"> 
        <label for="name">Navn:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">E-post:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Melding:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button type="submit" onclick="changeButtonText()">Send tilbakemelding</button>

    </form>
    <?php
// Koble til databasen (tilpass med dine egne databasedetaljer)
$servername = "localhost";
$username = "root";
$password = "Admin";
$database = "aarsoppgave_2024";

$conn = new mysqli($servername, $username, $password, $database);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sjekk om nøklene eksisterer i $_POST-arrayet før du prøver å få tilgang til dem
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    // Hent data fra skjemaet
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Forbered SQL-setningen for å sette inn data i databasen
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    // Utfør SQL-setningen og sjekk om dataene ble satt inn i databasen
    if ($conn->query($sql) === TRUE) {
        $feedback_message = "Takk, din tilbakemelding er mottatt!";
    } else {
        $feedback_message = "Feil: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Gi en feilmelding eller håndter situasjonen på annen måte hvis nøklene ikke er definert
    $feedback_message = "Feil: Skjemadataene er ufullstendige.";
}

// Lukk tilkoblingen til databasen
$conn->close();
?>


    
</section>

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



    <script src="./script.js"></script>  
    <script src="./profil.js"></script>
</body>
</html>
