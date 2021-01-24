<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>garage-read-klant.php</title>
</head>

<body>
    <h1>Garage Read Klant</h1>
    <p>Dit zijn alle gegevens uit de tabel klant van de database garage.</p>
<?php
error_reporting(0);
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant");

$klanten->execute();

echo "<table>";
echo "<tr>";
echo "<td>" . "ID" . "</td>" ;
echo "<td>" . "Naam" . "</td>";
echo "<td>" . "Adres" . "</td>";
echo "<td>" . "Postcode" . "</td>";
echo "<td>" . "Plaats" . "</td>"."<br/>";
echo "</tr>";

foreach($klanten as $klant) {
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>" ;
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>