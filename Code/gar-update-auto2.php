<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
     <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-update-auto2.php </title>
</head>

<div>
<body>
    <h1>Garage Update Auto</h1>
    <p>Dit formulier wordt gebruikt om auto gegevens te wijzigen in de tabel auto in de database garage.</p>
    <div class="klantauto">
<?php 
error_reporting(0);
$autokenteken= $_POST["autokentekenvak"];

if(!empty($autokenteken)) {
    require_once "gar-connect.php";

    $autos = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");

    $autos->execute(["autokenteken" => $autokenteken]);
            
    echo "<form action ='gar-update-auto3.php' method='post'>";
    foreach ($autos as $auto) {
        echo "Klant ID: " . $auto["klantid"];
        echo "<input type='hidden' name='klantidvak'";
        echo "value =' " . $auto["klantid"] . "'> <br/>";
  
        echo "Kenteken: <input type ='text'";
        echo "name = 'autokentekenvak' ";
        echo "value = '".$auto["autokenteken"]."' ";
        echo "> <br/>";
  
        echo "Merk: <input type ='text'";
        echo "name = 'automerkvak' ";
        echo "value = '".$auto["automerk"]."' ";
        echo "> <br/>";
  
        echo "Type: <input type ='text'";
        echo "name = 'autotypevak' ";
        echo "value = '".$auto["autotype"]."' ";
        echo "> <br/>";
  
        echo "Kilometerstand: <input type ='text'";
        echo "name = 'autokmstandvak' ";
        echo "value = '".$auto["autokmstand"]."' ";
        echo "> <br/>";
               }
        echo "<br/><input type='submit'>";
        echo "</form>";
}
else {
    echo "Vul een kenteken in.";
    echo "<br/><a href='gar-menu.php'><br/>[Terug naar het menu]</a>";
}
     ?>
</div>

</body>
</div>

</html>