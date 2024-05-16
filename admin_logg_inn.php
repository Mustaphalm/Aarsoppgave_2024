<?php
session_start();
include "db.connect.php"; // Inkluderer databasetilkoblingsfilen

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Henter data fra skjemaet og unngår SQL-injeksjon ved å bruke mysqli_real_escape_string
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL-spørring for å hente admininformasjon basert på brukernavn og passord
    $sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Sjekker om en rad er returnert fra databasen (gyldig pålogging)
    if (mysqli_num_rows($result) == 1) {
        // Setter administratoren som innlogget i økten
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        
        // Omdirigerer til admin_dashboard.php etter vellykket pålogging
        header("Location: admin.dashboard.php");
        exit();
    } else {
        // Gir tilbakemelding om ugyldig pålogging
        echo "Feil brukernavn eller passord.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Legg til stilark hvis ønskelig -->
    <title>Admin logg inn</title>
</head>
<body>

<a href="index.php">Tilbake til hovedsiden</a>

<h2>Administrator Logg inn</h2>

<!-- Skjema for innlogging -->
<form action="" method="post">
    <label for="username">Brukernavn:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Passord:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Logg inn">
</form>

</body>
</html>
