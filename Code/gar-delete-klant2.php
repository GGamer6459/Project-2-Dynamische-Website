<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-delete-klant2.php</title>
</head>

<div>
<body>
    <h1>Garage Delete Klant</h1>
    <p>Klant gegevens zoeken uit de tabel klant van de database garage zodat ze verwijderd kunnen worden.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$klantid = $_POST["klantidvak"];

if(!empty($klantid)) {
    require_once "gar-connect.php";
 
    $klanten = $conn->prepare("SELECT klantid, klantnaam, klantpostcode, klantadres, klantplaats FROM klant WHERE klantid = :klantid");

    $klanten->execute(["klantid"=>$klantid]);
 
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
    echo "<form action='gar-delete-klant3.php' method='post'>";
    echo "<br/><input type='hidden' name='klantidvak' value=$klantid>";
    echo "<input type='hidden'name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "Verwijder deze klant.";
    echo "<br/><br/><input type='submit'>";
    echo "</form>";
}
else {
    echo "<br/>Vul een klant ID in.";
    echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>"; 
}
?>
</div>

</body>
</div>

</html>