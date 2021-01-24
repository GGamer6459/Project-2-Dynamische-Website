<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="opmaak.css" />
    <meta name="author" content="Matin Arja" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gar-create-auto1.php</title>
</head>

<body>
    <h1>Garage Create Auto</h1>
    <p>Dit formulier wordt gebruikt om auto gegevens in te voeren.</p>
    <form action="gar-create-auto2.php" method="post">
        Klant ID: <input type="text" name="klantidvak" /><br/>
        Kenteken: <input type="text" name="autokentekenvak" /><br/>
        Merk: <input type="text" name="automerkvak" /><br/>
        Type: <input type="text" name="autotypevak" /><br/>
        Kilometerstand: <input type="text" name="autokmstandvak" /><br/>
        <br/><input type="submit" />
    </form>
</body>

</html>