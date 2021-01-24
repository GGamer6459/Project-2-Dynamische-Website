<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-delete-gebruiker3.php</title>
</head>

<body>
    <h1>Garage Delete Gebruiker</h1>
    <p>Gebruiker gegevens zoeken uit de tabel gebruiker van de database garage zodat ze verwijderd kunnen worden.</p>
<?php
error_reporting(0);
$gebruikersid = $_POST["gebruikersidvak"];
$verwijderen = $_POST["verwijdervak"];
    
if($verwijderen) {
    require_once "gar-connect.php";
    
    $sql = $conn->prepare("DELETE FROM gebruiker WHERE gebruikersid = :gebruikersid");

    try {                     
        $sql->execute(["gebruikersid"=>$gebruikersid]);
        echo "<br/>De gegevens zijn verwijderd.";
    }
    catch(Exception $e) {
        echo "<br/>De gebruiker kan niet verwijderd worden.";
    }
}   
else {
    echo "De gegevens zijn niet verwijderd.";
}

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>