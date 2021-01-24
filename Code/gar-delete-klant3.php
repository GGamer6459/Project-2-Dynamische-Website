<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-delete-klant3.php</title>
</head>

<body>
    <h1>Garage Delete Klant</h1>
    <p>Op klant gegevens zoeken uit de tabel klant van de database garage zodat ze verwijderd kunnen worden.</p>
<?php
error_reporting(0);
$klantid = $_POST["klantidvak"];
$verwijderen = $_POST["verwijdervak"];
    
if($verwijderen) {
    require_once "gar-connect.php";

    $sql = $conn->prepare("DELETE FROM klant WHERE klantid = :klantid");

    try {                     
        $sql->execute(["klantid"=>$klantid]);
        echo "<br/>De gegevens zijn verwijderd.";
    }
    catch(Exception $e) {
        echo "<br/>De klant kan niet verwijderd worden.";
    }
}   
else {
    echo "De gegevens zijn niet verwijderd.";
}

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>