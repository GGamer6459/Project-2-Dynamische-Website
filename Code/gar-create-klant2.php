<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="garagepaginas.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gar-create-klant2.php</title>
</head>

<div>
<body>
    <h1>Create Klant</h1>
    <p>Een klant toevoegen aan de tabel klant in de database garage.</p>
    <div class="klantauto">
    <?php
	   $klantid     = $_POST["klantidvak"];
	   $klantnaam   = $_POST["klantnaamvak"];
	   $klantpostcode = $_POST["klantpostcodevak"];
	   $klantadres     = $_POST["klantadresvak"];
	   $klantplaats  = $_POST["klantplaatsvak"];

       
	   require_once "gar-connect.php";

	   $sql = $conn->prepare("
	   	                      insert into klant values
	   	                      (      
	   	                             :klantid,  :klantnaam, :klantpostcode, :klantadres, :klantplaats

	   	                      )
							  ");
	if(!empty($klantid)) {
        try {           					  
        $sql->execute([
 
        	            "klantid"    => $klantid,
        	            "klantnaam"  => $klantnaam,
        	            "klantpostcode" => $klantpostcode,
        	            "klantadres"    => $klantadres,
        	            "klantplaats"  => $klantplaats
					 ]);
		echo "<br/>De klant is toegevoegd.";
        }
        catch(Exception $e) {
            echo "<br/>Een klant bestaat al voor dit ID.";
        }
    }
        echo "<br/><a href='gar-menu.php'>[Terug naar het menu]</a>";
    ?>
</div>

</body>
</div>

</html>

