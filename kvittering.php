<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kvittering</title>
</head>
<body>

<?php
    // Generer et tilfeldig ordrenummer
    $orderNumber = uniqid('ORD');
    ?>

    <h1>Takk for din bestilling!</h1>
    <p>Produktet er bestilt.</p>
    <p>Ordrenummer: <?php echo $orderNumber; ?></p>
    <p>Du vil motta en ordrebekreftelse på e-post.</p>


    <?php
// Koble til databasen (dine databasedetaljer)
include 'db.connect.php';

// Sjekk om dataene er sendt fra handlekurven og er tilgjengelige
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName'], $_POST['quantity'])) {
    // Hent dataene fra $_POST-arrayet
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];

    // Forbered SQL-setningen for å sette inn data i databasen
    $sql = "INSERT INTO orders (product_name, quantity) VALUES ('$productName', '$quantity')";
    
    // Utfør SQL-setningen og sjekk om dataene ble satt inn i databasen
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Gi en feilmelding eller håndter situasjonen på annen måte hvis dataene ikke er tilgjengelige
    echo "Feil: Produktinformasjonen er ufullstendig eller data ble ikke sendt riktig.";
}

// Lukk tilkoblingen til databasen
$conn->close();
?>


    
</body>
</html>
