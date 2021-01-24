<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-gebruiker3.php</title>
</head>

<body>
    <h1>Garage Update Gebruiker</h1>
    <p>Gebruiker gegevens wijzigen in de tabel gebruiker van de database garage.</p>
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
           echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
    ?>
</body>

</html>