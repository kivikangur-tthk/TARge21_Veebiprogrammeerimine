<?php
require("../dbConfig.php");
global $yhendus;
if (isset($_REQUEST["heaband_id"]) or
    isset($_REQUEST["paremband_id"]) or
    isset($_REQUEST["parimband_id"])) {
    $bandi_id = $_REQUEST["heaband_id"] ??
        $_REQUEST["paremband_id"] ??
        $_REQUEST["parimband_id"];
    $lisa = isset($_REQUEST["heaband_id"]) ? 1 :
        (isset($_REQUEST["paremband_id"]) ? 2 :
            (isset($_REQUEST["parimband_id"]) ? 3 : 0));
    $kask = $yhendus->prepare("UPDATE ansamblid SET punktid=punktid+? WHERE id=?");
    $kask->bind_param("ii", $lisa, $bandi_id);
    $kask->execute();
}
?>
    <!doctype html>
    <html lang="et">
    <head>
        <title>Ansamblid</title>
    </head>
    <body>
    <?php //echo 'PHP version: ' . phpversion(); ?>
    <h1>Ansamblid</h1>
    <table>
        <?php
        $kask = $yhendus->prepare("SELECT id, ansamblinimi, punktid FROM ansamblid where avalik=1");
        $kask->bind_result($id, $pealkiri, $punktid);
        $kask->execute();
        while ($kask->fetch()) {
            $pealkiri = htmlspecialchars($pealkiri);
            echo "<tr>
                    <td>$pealkiri</td>
                    <td>$punktid</td>
                    <td><a href='?heaband_id=$id'>Lisa punkt</a></td>
                    <td><a href='?paremband_id=$id'>Lisa 2 punkti</a></td>
                    <td><a href='?parimband_id=$id'>3 punkti juurde</a></td>
                  </tr>";
        }
        ?>
    </table>
    </body>
    </html>
<?php
$yhendus->close();
?>