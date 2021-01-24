<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-search-gebruiker2.php</title>
</head>

<div>
<body>
    <h1>Garage Search Gebruiker</h1>
    <p>Gebruiker gegevens zoeken uit de tabel gebruiker van de database garage.</p>
    <div class="klantauto">
<?php
error_reporting(0);
$gebruikersnaam = $_POST["gebruikersnaamvak"];

if(!empty($gebruikersnaam)) {
	require_once "gar-connect.php";

	$gebruikers = $conn->prepare("SELECT gebruikersnaam, gebruikerstype FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam");
                                          
	$gebruikers->execute(["gebruikersnaam"=>$gebruikersnaam]);

	echo "<table>";
    echo "<tr>";
    echo "<td>" . "Gebruikersnaam" . "</td>";
    echo "<td>" . "Gebruikerstype" . "</td>"."<br/>";
    echo "</tr>";

    foreach($gebruikers as $gebruiker) {
        echo "<tr>";
        echo "<td>" . $gebruiker["gebruikersnaam"] . "</td>";
        echo "<td>" . $gebruiker["gebruikerstype"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else {
    echo "Vul een gebruikersnaam in.";
}

echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
?>
</div>

</body>
</div>

</html>