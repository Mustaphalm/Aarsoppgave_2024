<?php
$server = "localhost";
$user = "root";
$pw = "Admin";
$db = "aarsoppgave_2024";

// Opprett tilkobling
$conn = mysqli_connect($server, $user, $pw, $db);

// Sjekk tilkobling
if (!$conn) {
    echo "Database connection failed! ";
    exit();
}
