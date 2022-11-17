<?php
require("../dbConfig.php");
global $yhendus;
if (!empty($_REQUEST["uuepealkiri"])) {
    $kask = $yhendus->prepare("INSERT INTO ansamblid(ansamblinimi,kommentaarid) VALUES(?,' ')");
    $kask->bind_param("s", $_REQUEST["uuepealkiri"]);
    $kask->execute();
    echo $yhendus->error;
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
?>
    <!doctype html>
    <html lang="et">
    <head>
        <title>Ansambli lisamine</title>
        <link rel="stylesheet" href="stiil.css" type="text/css"/>
    </head>
    <body>
    <?php
    //echo 'PHP version: ' . phpversion();
    include("navigatsioon.php");
    ?>
    <h1>Ansambel</h1>
    <form action="?">
        <label>Uue ansambli nimi:
            <input type="text" name="uuepealkiri"/>
        </label>
        <input type="submit" value="Lisa ansambel"/>
    </form>
    </body>
    </html>
<?php
$yhendus->close();
?>