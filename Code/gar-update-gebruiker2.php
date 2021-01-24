<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-gebruiker2.php</title>
</head>

<div>
<body>
    <h1>Garage Update Gebruiker</h1>
    <p>Dit formulier wordt gebruikt om gebruiker gegevens te wijzigen in de tabel gebruiker in de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$gebruikersnaam = $_POST["gebruikersnaamvak"];

if(!empty($gebruikersnaam)) {
     require_once "gar-connect.php";

     $gebruikers = $conn->prepare("SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam");

     $gebruikers->execute(["gebruikersnaam"=>$gebruikersnaam]);
         
     echo "<form action='gar-update-gebruiker3.php' method='post'>";
     foreach ($gebruikers as $gebruiker) {
          echo "Gebruikersnaam: <input type ='text'";
          echo "name = 'gebruikersnaamvak' ";
          echo "value = '".$gebruiker["gebruikersnaam"]."' ";
          echo "> <br/>";
     }
     echo "<br/><input type='submit'>";
     echo "</form>";
}
else {
     echo "Vul een gebruikersnaam in.";
     echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
}
    ?>
</div>

</body>
</div>

</html>