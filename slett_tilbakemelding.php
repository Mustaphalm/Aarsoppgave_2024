<?php
include "db.connect.php";


//Sjekker om ID ble sendt via URl-parameteren 
if (isset($_GET['id'])) {
    //Henter ID fra URL
    $id = $_GET['id'];

    //forbereder og utfører SQL-spørring for å slette en tilbakemelding med den id man får tildelt
    $sql = "DELETE FROM feedback WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    //Bind ID til spørringen
    mysqli_stmt_bind_param($stmt, "i", $id);

    //Utføre spørringen
    if (mysqli_stmt_execute($stmt)) {
        //Tilbakemelding ble slettet velykket, omdrigerer tilbake til admin-dashboard
        header("location: admin.dashboard.php");
        exit();
    } else {
        // Det oppstod en feil under slettingen
        echo "Feil: Kunne ikke slette tilbakemelding.";
    }
} else {
    // Hvis ID ikke ble sendt via URL-parameteren, omdiriger tilbake til admin-dashboardet
    header("Location: admin.dashboard.php");
    exit();
}
?>