<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-gebruiker3.php</title>
</head>

<div>
<body>
    <h1>Garage Update Gebruiker</h1>
    <p>Gebruiker gegevens wijzigen in de tabel gebruiker van de database garage.</p>
    <div class="klantauto">
    <?php
        $gebruikersnaam = $_POST["gebruikersnaamvak"];

        require_once "gar-connect.php";
        
        $sql = $conn->prepare("
                              update gebruiker set  gebruikersnaam =:gebruikersnaam
                             ");
                             
        $sql->execute(["gebruikersnaam"  => $gebruikersnaam]);

       if(!empty($gebruikersnaam)) {
           echo "<br/>De gebruiker is gewijzigd.";
       }

       else {
           echo "<br/>De gebruiker is niet gewijzigd.";
       }
           echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
  ?>
</div>

</body>
</div>

</html>