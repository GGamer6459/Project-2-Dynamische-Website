<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>garage-read-gebruiker.php</title>
</head>

<body>
    <h1>Garage Read Gebruiker</h1>
    <p>Dit zijn alle gegevens uit de tabel gebruiker van de database garage.</p>
<?php
error_reporting(0);
require_once "gar-connect.php";

$gebruikers = $conn->prepare("SELECT gebruikersid, gebruikersnaam, gebruikerstype FROM gebruiker");

$gebruikers->execute();

echo "<table>";
echo "<tr>";
echo "<td>" . "Gebruiker ID" . "</td>" ;
echo "<td>" . "Gebruikersnaam" . "</td>";
echo "<td>" . "Gebruikerstype" . "</td>"."<br/>";
echo "</tr>";

foreach($gebruikers as $gebruiker) {
    echo "<tr>";
    echo "<td>" . $gebruiker["gebruikersid"] . "</td>" ;
    echo "<td>" . $gebruiker["gebruikersnaam"] . "</td>";
    echo "<td>" . $gebruiker["gebruikerstype"] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>