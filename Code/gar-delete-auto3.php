<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-delete-auto3.php</title>
</head>

<div>
<body>
    <h1>Garage Delete Auto</h1>
    <p>Auto gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$autokenteken = $_POST["autokentekenvak"];
$verwijderen = $_POST["verwijdervak"];

if($verwijderen) {
    require_once "gar-connect.php";

    $sql = $conn->prepare("DELETE FROM auto WHERE autokenteken = :autokenteken");

    $sql->execute(["autokenteken"=>$autokenteken]);

    echo "<br/>De gegevens zijn verwijderd.";
}
else {
    echo "Foutmelding!";
    echo "<br/>De gegevens zijn niet verwijderd.";
}

echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";      
?>  
</div>  

</body>
</div>

</html>