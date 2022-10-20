<?php
$yhendus = new mysqli("localhost", "tunniplaan", "bh4r0opSfgOlaTdO", "tunniplaan"); // VÄGA PAHA - parool on veebist kättesaadav ja versioonihalduses
$kask = $yhendus->prepare("SELECT id, kassinimi, toon FROM kassid");
$kask->bind_result($id, $nimi, $toon);
$kask->execute();
?>
    <!doctype html>
    <html>
    <head>
        <title>Kassid lehel</title>
    </head>
    <body>
    <h1>Kasside loetelu</h1>
    <?php
    while ($kask->fetch()) {
        echo "<h2 style='background: " . htmlspecialchars($toon) . "'>" . htmlspecialchars($nimi) . "</h2>";
    }
    ?>
    </body>
    </html>
<?php
$yhendus->close();
?>
