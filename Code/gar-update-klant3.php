<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-klant3.php</title>
</head>

<div>
<body>
    <h1>Garage Update Klant</h1>
    <p>Klant gegevens wijzigen in de tabel klant van de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$klantid = $_POST["klantidvak"];
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

require_once "gar-connect.php";
        
$sql = $conn->prepare("UPDATE klant SET klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantplaats = :klantplaats
                       WHERE klantid = :klantid");
                             
$sql->execute(["klantid"=>$klantid, "klantnaam"=>$klantnaam, "klantadres"=>$klantadres, "klantpostcode"=>$klantpostcode, "klantplaats"=>$klantplaats]);

if(!empty($klantid)) {
    echo "<br/>De klant is gewijzigd.";
}
else {
    echo "<br/>De klant is niet gewijzigd.";
}

echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>