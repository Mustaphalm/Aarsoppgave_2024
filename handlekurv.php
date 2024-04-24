<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="./cart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handlekurv</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- Handlekurv modal -->
 <h2 id="cart"></h2> 

<div id="handlekurv-modal">
  <div class="modal-content">
    <span class="close" onclick="closeCart()">&times;</span>
    <h2>Handlekurv</h2>
   
   

  </div>
</div>

<button id="emptyCartButton" onclick="emptyCart()">Tøm handlekurv</button>


<!-- En knapp som viser handlekurv -->
<button onclick = "showCart()" id="showCart">Vis handlekurv</button>
<h2>Handlekurv</h2>


<!-- Bestill-knapp -->
<button onclick="placeOrder()">Bestill</button>


<script>
function placeOrder() {
    // Her kan du legge til logikken for å plassere en bestilling, for eksempel lagre data i databasen, sende e-post osv.
    // Etter at bestillingen er fullført, kan du omdirigere brukeren til kvitteringssiden:
    window.location.href = "kvittering.php";
}
</script>

<script src="./cart.js"></script>

</body>
</html>



<?php
// Koble til databasen ( gne databasedetaljer)
include 'db.connect.php';

// Sjekk om dataene er sendt fra JavaScript og er tilgjengelige
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName'], $_POST['quantity'])) {
    // Hent dataene fra $_POST-arrayet
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];

    // Forbered SQL-setningen for å sette inn data i databasen
    $sql = "INSERT INTO orders 
(product_name, quantity) VALUES ('$productName', '$quantity')";
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



