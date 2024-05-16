<?php
session_start();

// Sjekk om en økt er aktiv og om brukeren er logget inn
if(isset($_SESSION['brukernavn'])) {
    // Brukeren er logget inn

    // Inkluder filen for databasekoblingen
    include 'db.connect.php';

    // Hent brukerens profilinformasjon fra databasen basert på brukerens øktinformasjon
    $bruker_id = $_SESSION['id']; // Anta at brukerens ID er lagret i økten

    // SQL-spørring for å hente brukerens profilinformasjon basert på brukerens ID
    $sql = "SELECT * FROM users WHERE id='$bruker_id'";
    $result = mysqli_query($conn, $sql);

    // Sjekk om resultatet ble returnert og om det er minst én rad
    if ($result && mysqli_num_rows($result) > 0) {
        // Hent brukerens data
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $email = $row['email'];
    } else {
        // Ingen data ble funnet, sett standardverdier
        $navn = '';
        $email = '';
    }

    // Lukk databaseforbindelsen
    $conn->close();
} else {
    // Brukeren er ikke logget inn, omdiriger til innloggingssiden
    header("Location: Logg_inn.php");
    exit(); // Avslutt PHP-skriptet etter omdirigering
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome ikoner -->    
    <link rel="stylesheet" href="style.css">
    <title>Min Profil</title>
</head>
<body>
    
<div class="off-screen-menu">
    <ul>
        <li><a href="index.php">Hjem</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
        <li><a href="Support.php">Få Hjelp</a></li>
        <li><a href="Kundekonto.php">Min Profil</a></li>
        <li><a href="handlekurv.php"> Handlekurv</a></li>
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

<div class="container">
    <h1>Min Profil</h1>
    <div id="profile-info">
        <!-- Brukerens profilinformasjon vises her -->
        <p><strong>Navn:</strong> <?php echo $first_name; ?></p>
        <p><strong>E-post:</strong> <?php echo $email; ?></p>
    </div>
    <button onclick="editProfile()">Rediger Profil</button>
    <div id="edit-profile" style="display: none;">
        <h2>Rediger Profil</h2>
        <form id="profile-form" action="update_profile.php" method="post">
            <label for="name">Navn:</label>
            <input type="text" id="name" name="name" value="<?php echo $navn; ?>" required><br>
            <label for="email">E-post:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
            <button type="submit">Lagre endringer</button>
        </form>
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
                <li class="fListItem"><a href="Index.html">Hjem</a></li>
                <li class="fListItem"><a href="Opplæringsmateriell.html">Opplæringsmateriell</a></li>
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
                <a href="https://www.facebook.com"><img src="./Bilder/facebook.png" alt="Facebook" class="fIcon"></a>
                <a href="https://www.twitter.com"><img src="./Bilder/twitter.png" alt="Twitter" class="fIcon"></a>
                <a href="https://www.instagram.com"><img src="./Bilder/instagram.png" alt="Instagram" class="fIcon"></a>
            </div>
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
