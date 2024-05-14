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
<button onclick="showCart()" id="showCart">Vis handlekurv</button>
<h2>Handlekurv</h2>

<!-- Bestill-knapp -->
<button onclick="placeOrder()">Bestill</button>

<script>
function placeOrder() {

    // Her kan du legge til logikken for å plassere en bestilling, for eksempel lagre data i databasen, sende e-post osv.
    // Etter at bestillingen er fullført, kan du omdirigere brukeren til kvitteringssiden:
    var items = localStorage.getItem("lagretHandlekurv");
    document.cookie = "items = " + items;
    window.location.href = "kvittering.php";
    
    
}
</script>

<script src="./cart.js"></script>

</body>
</html>
