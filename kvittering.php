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
    $product =  $_COOKIE["items"];
    echo $product;
    echo gettype($product) . "<br>";
    $sql = "INSERT INTO orders (customer_name, customer_email, product_name, quantity, user_id) VALUES ('$brukernavn', '$email', '$product', 1, $bruker_id)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Hent ordrenummeret for den siste bestillingen
        $orderNumber = mysqli_insert_id($conn);
        echo "Record inserted successfully. Order number: " . $orderNumber;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    

   
   # $sql = "SELECT * FROM orders WHERE user_id = '$bruker_id'";
    
    // Utfør spørringen
    // $result = $conn->query($sql);

    // // Sjekk om det finnes bestillingsinformasjon for den påloggede brukeren
    // if ($result->num_rows > 0) {
    //     // Vis kvitteringsinformasjonen for hver bestilling
    //     while($row = $result->fetch_assoc()) {
    //         echo "<h1>Kvittering for ordrenummer: " . $row['order_number'] . "</h1>";
    //         echo "<p>Produkt: " . $row['product_name'] . "</p>";
    //         echo "<p>Antall: " . $row['quantity'] . "</p>";
    //         echo "<p>Ordredato: " . $row['order_date'] . "</p>";
    //         // Legg til annen relevant informasjon om bestillingen
    //     }
    // } else {
    //     echo "<p>Ingen bestillinger funnet.</p>";
    // }

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
    <title>Kvittering</title>
</head>
<body>
    <div>
        <h1>Takk for din bestilling!</h1>
        <p>Vi har mottatt din bestilling.</p>
        <div>
            <p>Din bestilling er bekreftet.</p>
            <p>Du vil motta en ordrebekreftelse på e-post.</p>
        </div>
        <p>Ordrenummer: <?php echo $orderNumber; ?></p>
        <a href="index.php">Tilbake til startsiden</a>
    </div>
</body>
</html>