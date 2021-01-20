<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="garagepaginas.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gar-search-auto2.php</title>
</head>

<div>
<body>
    <h1>Zoeken Op Kenteken</h1>
    <p>Op kenteken gegevens zoeken uit de tabel auto van de database garage.</p>
    <div class="klantauto">
    <?php
            $autokenteken = $_POST["autokentekenvak"];

            require_once "gar-connect.php";

            $autos = $conn->prepare("
                                       select autokenteken,
                                       automerk,
                                        autotype,
                                        autokmstand,
                                        klantid
                                        from  auto
                                        where  autokenteken = :autokenteken");
            $autos->execute(["autokenteken" => $autokenteken]);

            echo "<table>";
            echo "<tr>"; 
            echo "<td>" . "Klant ID" . "</td>";
            echo "<td>" . "Type" . "</td>" ;
            echo "<td>" . "Merk" . "</td>";
            echo "<td>" . "Kilometerstand" . "</td>";
            echo "<td>" . "Kenteken" . "</td>" . "<br/>";
            echo "</tr>";

        foreach($autos as $auto)
        {
            echo "<tr>";
            echo "<td>" . $auto["klantid"] . "</td>";
            echo "<td>" . $auto["autotype"] . "</td>";
            echo "<td>" . $auto["automerk"] . "</td>";
            echo "<td>" . $auto["autokmstand"] . "</td>";
            echo "<td>" . $auto["autokenteken"] . "</td>";
            echo "<tr>";
        }
            echo "</table>";
            echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
        ?>
    </div>

</body>
</div>


</html>

