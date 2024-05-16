<?php
session_start();
include "db.connect.php";

// Sjekker om admin er logget inn
if (!isset($_SESSION['admin_logged_in'])) {
    header("location: admin_logg_inn.php");
    exit();
}
?>

<p> Velkommen, <?php echo $_SESSION['admin_username']; ?>!</p>
<h2> Administrator Dashboard </h2>  

<?php
// Vis oversikt over tilbakemeldinger
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h3>Oversikt over tilbakemeldinger:</h3>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Navn</th><th>E-post</th><th>Melding</th><th>Handlinger</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>"; // Sjekk at dette samsvarer med kolonnenavnene i databasetabellen
        echo "<td>" . $row['name'] . "</td>"; // Sjekk at dette samsvarer med kolonnenavnene i databasetabellen
        echo "<td>" . $row['email'] . "</td>"; // Sjekk at dette samsvarer med kolonnenavnene i databasetabellen
        echo "<td>" . $row['message'] . "</td>";
        // Legg til handlinger (f.eks. sletting, redigering) etter behov
        echo "<td><a href='update_status.php?id=" . $row['id'] . "&status=Behandlet'>Merk som behandlet</a> | <a href='slett_tilbakemelding.php?id=" . $row['id'] . "'>Slett tilbakemelding</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Ingen tilbakemeldinger å vise.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>

<a href="index.php">Tilbake til hovedsiden</a>

</body>
</html>
