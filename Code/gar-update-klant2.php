<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-klant2.php</title>
</head>

<div>
<body>
    <h1>Garage Update Klant</h1>
    <p>Dit formulier wordt gebruikt om klant gegevens te wijzigen in de tabel klant in de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$klantnaam = $_POST["klantnaamvak"];

if(!empty($klantnaam)) {
  require_once "gar-connect.php";

  $klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant WHERE klantnaam = :klantnaam");

  $klanten->execute(["klantnaam"=>$klantnaam]);
         
  echo "<br/><form action='gar-update-klant3.php' method='post'>";
  foreach ($klanten as $klant) {
    echo "ID: " . $klant["klantid"];
    echo "<input type='hidden' name='klantidvak'";
    echo "value =' " . $klant["klantid"] . "'> <br/>";

    echo "Naam: <input type ='text'";
    echo "name = 'klantnaamvak' ";
    echo "value = '".$klant["klantnaam"]."' ";
    echo "> <br/>";

    echo "Adres: <input type ='text'";
    echo "name = 'klantadresvak' ";
    echo "value = '".$klant["klantadres"]."' ";
    echo "> <br/>";

    echo "Postcode: <input type ='text'";
    echo "name = 'klantpostcodevak' ";
    echo "value = '".$klant["klantpostcode"]."' ";
    echo "> <br/>";

    echo "Plaats: <input type ='text'";
    echo "name = 'klantplaatsvak' ";
    echo "value = '".$klant["klantplaats"]."' ";
    echo "> <br/><br/>";
  }
  echo "<input type='submit'>";
  echo "</form>";
}
else {
  echo "Vul een naam in.";
  echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
}
     ?>
</div>

</body>
</div>

</html>