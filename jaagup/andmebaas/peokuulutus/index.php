<?php
require("../dbConfig.php"); // hoida väljaspool veebist kättesaadavat teekonda
global $yhendus;
if (isset($_REQUEST["fname"], $_REQUEST["lname"], $_REQUEST["email"])) {
    $kask = $yhendus->prepare("INSERTi INTO `peolised` (`eesnimi`, `perenimi`, `epost`) VALUES (?, ?, ?)");
    $kask->bind_param("sss", $_REQUEST["fname"], $_REQUEST["lname"], $_REQUEST["email"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]?message=Registered");
    $yhendus->close();
    exit();
}


?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peokuulutus</title>
</head>
<body>
<h1>Suur pidu!</h1>
<h2>Olete kutsutud!</h2>
<?php if (isset($_REQUEST["message"])) { ?>
    <h3 style="background: beige">Olete registreeritud :)</h3>
<?php } else { ?>
    <h3>Palun registreeri oma andmed:</h3>
    <form>
        <label for="fname">Eesninmi:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Perenimi:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="email">E-post:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <input type="submit" value="Registreeri">
    </form>
<?php } ?>
</body>
</html>
