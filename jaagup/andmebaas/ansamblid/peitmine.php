<?php
global $yhendus;
if (isset($_REQUEST["peitmise_id"])) {
    $kask = $yhendus->prepare("UPDATE ansamblid SET avalik=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["peitmise_id"]);
    $kask->execute();
}
if (isset($_REQUEST["avamise_id"])) {
    $kask = $yhendus->prepare("UPDATE ansamblid SET avalik=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["avamise_id"]);
    $kask->execute();
}
if (isset($_REQUEST["sule_bandid"])) {
    $kask = $yhendus->prepare("UPDATE ansamblid SET avalik=0 WHERE punktid=0");
    $kask->execute();
}
if (isset($_REQUEST["ava_bandid"])) {
    $kask = $yhendus->prepare("UPDATE ansamblid SET avalik=1 WHERE punktid=0");
    $kask->execute();
}
?>
    <h1>Ansamblid</h1>
    <?php
    echo "<a href='?ava_bandid'>Ava</a> / ";
    echo "<a href='?sule_bandid'>Peida</a> 0 hindega ansamblid";

    ?>
    <table>
        <?php
        $kask = $yhendus->prepare("SELECT id, ansamblinimi, avalik FROM ansamblid");
        $kask->bind_result($id, $pealkiri, $avalik);
        $kask->execute();
        while ($kask->fetch()) {
            $pealkiri = htmlspecialchars($pealkiri);
            $avamistekst = "Ava";
            $avamisparam = "avamise_id";
            $avamisseisund = "Peidetud";
            if ($avalik == 1) {
                $avamistekst = "Peida";
                $avamisparam = "peitmise_id";
                $avamisseisund = "Avatud";
            }
            echo "<tr>
                    <td>$pealkiri</td>
                    <td>$avamisseisund</td>
                    <td><a href='?$avamisparam=$id'>$avamistekst</a></td>
                    </tr>";
        }
        ?>
    </table>
