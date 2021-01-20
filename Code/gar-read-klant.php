<!doctype html>
<html lang="nl">

<head>
<link rel="stylesheet" type="text/css" href="garagepaginas.css">
<link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>garage-read-klant.php</title>
</head>

<div>
<body>
    <h1>Read Klant</h1>
    <p>Dit zijn alle gegevens uit de tabel klanten van de database garage.</p>
    <div class="klantauto">
    <?php 
    require_once "gar-connect.php";

    $klanten=$conn->prepare("SELECT         klantid, klantnaam, 
                                            klantadres, klantpostcode, 
                                            klantplaats
                             FROM           klant
                            ");

    $klanten -> execute ();
            echo "<table>";
            echo "<tr>";
            echo "<td>" . "ID" . "</td>" ;
            echo "<td>" . "Naam" . "</td>";
            echo "<td>" . "Adres" . "</td>";
            echo "<td>" . "Postcode" . "</td>";
            echo "<td>" . "Plaats" . "</td>"."<br/>";
            echo "</tr>";

        foreach($klanten as $klant) {
            echo "<tr>";
            echo "<td>" . $klant["klantid"] . "</td>" ;
            echo "<td>" . $klant["klantnaam"] . "</td>";
            echo "<td>" . $klant["klantadres"] . "</td>";
            echo "<td>" . $klant["klantpostcode"] . "</td>";
            echo "<td>" . $klant["klantplaats"] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
        ?>
    </div>

</body>
</div>

</html>

