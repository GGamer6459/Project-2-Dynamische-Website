<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="garagepaginas.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gar-delete-klant3.php</title>
</head>

<div>
<body>
    <h1>Delete Klant</h1>
    <p>
        Op klant gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnen worden.
    </p>
    <div class="klantauto">
    <?php
        $klantid = $_POST["klantidvak"];
        $verwijderen = $_POST["verwijdervak"];
    
        if($verwijderen)
        {
           require_once "gar-connect.php";
           $sql = $conn->prepare("DELETE FROM klant
                                  where klantid = :klantid
                                ");

           try {                     
           $sql->execute(["klantid" => $klantid]);
           echo "<br/>De gegevens zijn verwijderd.";
           }
           catch(Exception $e) {
               echo "<br/>De klant kan niet verwijderd worden.";
           }
        }   
        else {
            echo " Foutmelding!";
            echo "</br>De gegevens zijn niet verwijderd";
        }
        echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
    ?>
  </div>

</body>
</div>

</html>

