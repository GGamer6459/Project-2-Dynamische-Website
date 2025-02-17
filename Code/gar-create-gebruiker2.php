<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-create-gebruiker2.php</title>
</head>

<div>
<body>
    <h1>Garage Create Gebruiker</h1>
    <p>Een gebruiker toevoegen aan de tabel gebruiker in de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$gebruikersid     = NULL;
$gebruikersnaam   = $_POST["gebruikersnaamvak"];
$wachtwoord = $_POST["wachtwoordvak"];
$gebruikerstype = "standaard";

require_once "gar-connect.php";

$sql = $conn->prepare("INSERT INTO gebruiker VALUES (:gebruikersid, :gebruikersnaam, :wachtwoord, :gebruikerstype)");
       
if(!empty($gebruikersnaam)) {
    try {                                 
        $sql->execute(["gebruikersid"=>$gebruikersid, "gebruikersnaam"=>$gebruikersnaam, "wachtwoord"=>$wachtwoord, "gebruikerstype"=>$gebruikerstype]);
        echo "<br/>De gebruiker is toegevoegd.";
        }
    catch(Exception $e) {
        echo "<br/>Deze gebruiker bestaat al.";
    }
}
else {
    echo "<br/>Vul een gebruikersnaam in.";
}

echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>