<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-create-klant2.php</title>
</head>

<body>
    <h1>Garage Create Klant</h1>
    <p>Een klant toevoegen aan de tabel klant in de database garage.</p>
<?php
error_reporting(0);
$klantid = NULL;
$klantnaam = $_POST["klantnaamvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantadres = $_POST["klantadresvak"];
$klantplaats = $_POST["klantplaatsvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("INSERT INTO klant VALUES (:klantid,  :klantnaam, :klantpostcode, :klantadres, :klantplaats)");

if(!empty($klantnaam)) {
    try {           					  
        $sql->execute(["klantid"=>$klantid, "klantnaam"=>$klantnaam, "klantpostcode"=>$klantpostcode, "klantadres"=>$klantadres, "klantplaats"=>$klantplaats]);
		echo "<br/>De klant is toegevoegd.";
        }
    catch(Exception $e) {
        echo "<br/>Een klant bestaat al voor dit ID.";
    }
}
else {
	echo "<br/>Vul een naam in.";
}

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</body>

</html>