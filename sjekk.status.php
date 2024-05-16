<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Sjekk status</title>
</head>
<body>

<h2>Sjekk Status</h2>

<!-- lenke tilbake til hovesiden -->
<a href="index.php"> Tilbake til hovedsiden</a>


<!-- Skjema for å sjekke status -->
<form action="sjekk.status.php" method="post">
        <label for="feedback_id">Tilbakemelding ID:</label><br>
        <input type="text" id="feedback_id" name="feedback_id" required><br><br>
        <input type="submit" value="Sjekk Status">
    </form>

    <?php
    // inkluderer databasetilkoblingen

    include 'db.connect.php';

    //Sjekker om skjemaet er sendt 
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
           // Henter og rens innsendt tilbakemeldings-ID
           $feedback_id = mysqli_real_escape_string($conn, $_POST['feedback_id']);

           // SQL-spørring for å hente status basert på tilbakemeldings-ID
           $sql = "SELECT * FROM feedback WHERE id = ?";
           
           // Bruk av forberedt uttalelse
           $stmt = mysqli_prepare($conn, $sql);
           mysqli_stmt_bind_param($stmt, "i", $feedback_id);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);
   
           if ($result) {
               if (mysqli_num_rows($result) > 0) {
   
                   // Tilbakemeldings-ID-en ble funnet, vis statusen
                   $row = mysqli_fetch_assoc($result);
                   echo "<h3>Informasjon for tilbakemelding med ID $feedback_id:</h3>";
                   echo "Navn: " . $row['name'] . "<br>";
                   echo "E-post: " . $row['email'] . "<br>";
                   echo "Melding: " . $row['message'] . "<br>";
                   echo "Status: " . $row['status'] . "<br>";
                   echo "Opprettet: " . $row['created_at'] . "<br>";
               } else {
                   // Tilbakemeldings-ID-en ble ikke funnet
                   echo "Ingen tilbakemelding med denne ID-en ble funnet.";
               }
           } else {
               echo "Feil ved henting av status: " . mysqli_error($conn);
           }
       }
       ?>
   </body>
   </html>

    
    



    
</body>
</html>