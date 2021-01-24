<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-delete-gebruiker2.php</title>
</head>

<div>
<body>
    <h1>Garage Delete Gebruiker</h1>
    <p>Gebruiker gegevens zoeken uit de tabel gebruiker van de database garage zodat ze verwijderd kunnen worden.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$gebruikersid = $_POST["gebruikersidvak"];

if(!empty($gebruikersid)) {       
    require_once "gar-connect.php";
 
    $gebruikers = $conn->prepare("SELECT gebruikersid, gebruikersnaam, wachtwoord, gebruikerstype FROM gebruiker WHERE gebruikersid = :gebruikersid");

    $gebruikers->execute(["gebruikersid"=>$gebruikersid]);
 
    echo "<table>";
    echo "<tr>";
    echo "<td>" . "Gebruiker ID" . "</td>" ;
    echo "<td>" . "Gebruikersnaam" . "</td>";
    echo "<td>" . "Wachtwoord" . "</td>";
    echo "<td>" . "Gebruikerstype" . "</td>"."<br/>";
    echo "</tr>";

    foreach($gebruikers as $gebruiker) {
        echo "<tr>";
        echo "<td>" . $gebruiker["gebruikersid"] . "</td>" ;
        echo "<td>" . $gebruiker["gebruikersnaam"] . "</td>";
        echo "<td>" . $gebruiker["gebruikerstype"] . "</td>";
        echo "<td>" . $gebruiker["wachtwoord"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<form action='gar-delete-gebruiker3.php' method='post'>";
    echo "<br/><input type='hidden' name='gebruikersidvak' value=$gebruikersid>";
    echo "<input type='hidden'name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "Verwijder deze gebruiker.";
    echo "<br/><br/><input type='submit'>";
    echo "</form>";
}
else {
    echo "<br/>Vul een gebruiker ID in.";
    echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>"; 
}
?>
</div>

</body>
</div>

</html>