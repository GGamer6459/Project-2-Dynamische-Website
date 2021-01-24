<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-read-met-eigenaren.php</title>
</head>

<div>
<body>
    <h1>Garage Read Met Eigenaren</h1>
    <p>Dit document wordt gebruikt om te zien welke auto van wie is.</p>
    <div class="klantauto">
<?php
error_reporting(0);
require_once "gar-connect.php";
 
$autos = $conn->prepare("SELECT k.klantnaam, a.autokenteken, a.automerk, a.autotype, k.klantid, a.autokmstand FROM klant k INNER JOIN auto a ON k.klantid = a.klantid");

$autos->execute();

echo "<table>";
echo "<tr>";
echo "<td>" . "ID" . "</td>";
echo "<td>" . "Naam" . "</td>";
echo "<td>" . "Kenteken" . "</td>" . "<br/>";
echo "<td>" . "Type" . "</td>" ;
echo "<td>" . "Merk" . "</td>";
echo "<td>" . "Kilometerstand" . "</td>";
echo "</tr>";

foreach($autos as $auto) {
    echo "<tr>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "<td>" . $auto["klantnaam"] . "</td>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<tr>";
}
echo "</table>";

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>