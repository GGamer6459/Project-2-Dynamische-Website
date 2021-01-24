<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-auto3.php</title>
</head>

<div>
<body>
    <h1>Garage Update Auto</h1>
    <p>Auto gegevens wijzigen in de tabel auto van de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$autokenteken = $_POST["autokentekenvak"];
$autotype = $_POST["autotypevak"];
$automerk = $_POST["automerkvak"];
$autokmstand = $_POST["autokmstandvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("UPDATE auto SET autokenteken = :autokenteken, autotype = :autotype, automerk = :automerk,  autokmstand = :autokmstand
                       WHERE autokenteken = :autokenteken");

$sql->execute(["autokenteken"=>$autokenteken, "autotype"=>$autotype, "automerk"=>$automerk, "autokmstand"=>$autokmstand]);
        
if(!empty($autokenteken)) {
    echo "<br/>De auto is gewijzigd.";
}
else {
    echo "<br/>De auto is niet gewijzigd.";
}

echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>