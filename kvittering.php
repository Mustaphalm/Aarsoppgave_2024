<?php
session_start();

// Sjekk om en økt er aktiv og om brukeren er logget inn
if(isset($_SESSION['brukernavn'])) {
    // Brukeren er logget inn

    // Inkluder filen for databasekoblingen
    include 'db.connect.php';

    // Hent bestillingsinformasjon fra databasen basert på brukerens øktinformasjon
    $bruker_id = $_SESSION['id']; // Anta at brukerens ID er lagret i økten
    $brukernavn = $_SESSION["brukernavn"];
    
    // Sjekk om nøkkelen "email" er definert i $_SESSION-arrayen
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : '';

    echo $bruker_id;

    // SQL-spørring for å hente bestillingsinformasjon basert på brukerens ID
    $product =  $_COOKIE["items"]; // Henter produktinformasjon fra en informasjonskapsel (cookie)
    echo $product; // Viser produktinformasjonen
    echo gettype($product) . "<br>"; // Viser typen til $product-variabelen
    $sql = "INSERT INTO orders (customer_name, customer_email, product_name, quantity, user_id) VALUES ('$brukernavn', '$email', '$product', 1, $bruker_id)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Hent ordrenummeret for den siste bestillingen
        $orderNumber = mysqli_insert_id($conn);
        echo "Record inserted successfully. Order number: " . $orderNumber; // Viser en bekreftelse på at dataene ble lagt til i databasen
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Viser en feilmelding hvis det oppstår en feil under innsetting av dataene i databasen
    }
 
    $conn->close(); // Lukker tilkoblingen til databasen
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
    <title>Kvittering</title> <!-- Tittel på siden -->
</head>
<body>
    <div>
        <h1>Takk for din bestilling!</h1> <!-- Overskrift for kvittering -->
        <p>Vi har mottatt din bestilling.</p> <!-- Informasjonsmelding om at bestillingen er mottatt -->
        <div>
            <p>Din bestilling er bekreftet.</p> <!-- Informasjonsmelding om at bestillingen er bekreftet -->
            <p>Du vil motta en ordrebekreftelse på e-post.</p> <!-- Informasjonsmelding om at en ordrebekreftelse vil bli sendt på e-post -->
        </div>
        <p>Ordrenummer: <?php echo $orderNumber; ?></p> <!-- Viser ordrenummeret for den siste bestillingen -->
        <a href="index.php">Tilbake til startsiden</a> <!-- Lenke tilbake til startsiden -->
    </div>
</body>
</html>
