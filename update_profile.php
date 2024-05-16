<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inkluderer databasekoblingen
    include 'db.connect.php';

    // Hent brukerens ID fra økten
    $user_id = $_SESSION['id'];

    // Hent dataene som er sendt fra redigeringskjemaet
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // SQL-spørring for å oppdatere brukerens profilinformasjon i databasen
    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id=$user_id";

    if (mysqli_query($conn, $sql)) {
        // Profilinformasjonen ble oppdatert vellykket
        // Omdiriger brukeren tilbake til profilsiden med en melding om suksess
        header("Location: Kundekonto.php?update=success");
        exit();
    } else {
        // Hvis oppdateringen mislyktes, vis feilmelding
        echo "Feil ved oppdatering av profil: " . mysqli_error($conn);
    }

    // Lukk databaseforbindelsen
    mysqli_close($conn);
} else {
    // Hvis forespørselsmetoden ikke er POST, omdiriger brukeren tilbake til profilsiden
    header("Location: Kundekonto.php");
    exit();
}
?>
