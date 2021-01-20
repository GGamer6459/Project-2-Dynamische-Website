<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="garagepaginas.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gar-type-auto-met-eigenaar2.php</title>
</head>

<div>
<body>
    <h1>Type Auto's met Eigenaren</h1>
    <p>
        Dit document wordt gebruikt om klantgegevens van bepaalde autotypes te kijken/zien.
    </p>
    <div class="klantauto">
    <?php

            require_once "gar-connect.php";

            $autotype = $_POST["autotypevak"];
 
            $klanten= $conn->prepare("SELECT     k.klantnaam, k.klantadres,
                                                 k.klantid, k.klantpostcode,
                                                 k.klantplaats, a.autotype
                                                 
                                      FROM       klant k
                                      INNER JOIN auto a ON k.klantid = a.klantid
                                      WHERE      a.autotype = :autotype
                                    ");

            $klanten->execute(["autotype" => $autotype]);

                echo "<table>";
                echo "<tr>"; 
                echo "<td>" . "Naam" . "</td>";
                echo "<td>" . "Adres" . "</td>";
                echo "<td>" . "Postcode" . "</td>";
                echo "<td>" . "Plaats" . "</td>";
                echo "<td>" . "Autotype" . "</td>" . "<br/>";
                echo "</tr>";

            foreach($klanten as $klant)
            {
                echo "<tr>";
                echo "<td>" . $klant["klantnaam"] ."</td>";
                echo "<td>" . $klant["klantadres"] ."</td>";
                echo "<td>" . $klant["klantid"] . "</td>" ;
                echo "<td>" . $klant["klantpostcode"] . "</td>";
                echo "<td>" . $klant["klantplaats"] . "</td>";
                echo "<td>" . $klant["autotype"] . "</td>" . "<br/>";
                echo "</tr>";
            }
                echo "</tabel>";
                echo "<br/><a href='gar-menu.php'>Terug naar het menu</a>";
    ?>
</div>

</body>
</div>

</html>

