<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-search-auto2.php</title>
</head>

<div>
<body>
    <h1>Garage Search Auto</h1>
    <p>Auto gegevens zoeken uit de tabel auto van de database garage.</p>
    <div class="klantauto">

<?php
error_reporting(0);
$autokenteken = $_POST["autokentekenvak"];

if(!empty($autokenteken)) {
    require_once "gar-connect.php";

    $autos = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");

    $autos->execute(["autokenteken" => $autokenteken]);

    echo "<table>";
    echo "<tr>"; 
    echo "<td>" . "Klant ID" . "</td>";
    echo "<td>" . "Type" . "</td>" ;
    echo "<td>" . "Merk" . "</td>";
    echo "<td>" . "Kilometerstand" . "</td>";
    echo "<td>" . "Kenteken" . "</td>" . "<br/>";
    echo "</tr>";

    foreach($autos as $auto){
        echo "<tr>";
        echo "<td>" . $auto["klantid"] . "</td>";
        echo "<td>" . $auto["autotype"] . "</td>";
        echo "<td>" . $auto["automerk"] . "</td>";
        echo "<td>" . $auto["autokmstand"] . "</td>";
        echo "<td>" . $auto["autokenteken"] . "</td>";
        echo "<tr>";
    }
    echo "</table>";
}
else {
    echo "Vul een kenteken in.";
}

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>
