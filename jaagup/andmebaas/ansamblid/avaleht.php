<?php
global $yhendus;
if (isset($_REQUEST["heaband_id"]) or
    isset($_REQUEST["paremband_id"]) or
    isset($_REQUEST["parimband_id"]) or
    isset($_REQUEST["viletsband_id"])) {
    $bandi_id = $_REQUEST["heaband_id"] ??
        $_REQUEST["paremband_id"] ??
        $_REQUEST["parimband_id"] ??
        $_REQUEST["viletsband_id"];
    $lisa = isset($_REQUEST["viletsband_id"]) ? -1 :
        (isset($_REQUEST["heaband_id"]) ? 1 :
            (isset($_REQUEST["paremband_id"]) ? 2 :
                (isset($_REQUEST["parimband_id"]) ? 3 : 0)));
    $kask = $yhendus->prepare("UPDATE ansamblid SET punktid=punktid+? WHERE id=?");
    $kask->bind_param("ii", $lisa, $bandi_id);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit;
}
if (isset($_REQUEST["uue_kommentaari_id"])) {
    $kask = $yhendus->prepare(
        "UPDATE ansamblid SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
    $kommentaarilisa = "\n" . $_REQUEST["uus_kommentaar"] . "\nLisatud: " . gmdate("H:i d.m.Y") . "\n";
    $kask->bind_param("si", $kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
    $kask->execute();
}
if (isset($_REQUEST["id"])) {
    $kask = $yhendus->prepare("SELECT id, ansamblinimi, kommentaarid, punktid, otsus, avalik FROM ansamblid WHERE id=?");
    $kask->bind_param("i", $_REQUEST["id"]);
    $kask->bind_result($id, $nimi, $kommentaarid, $punktid, $otsus, $avalik);
    $kask->execute();
    if ($kask->fetch()) {
        $nimi = htmlspecialchars($nimi);
        $kommentaarid = nl2br(htmlspecialchars($kommentaarid));
        $avalik = $avalik == 1 ? "Avalik" : "Peidetud";
        ?>
        <h2><?= $nimi ?></h2>
        <dl>
            <dt>Punkte:</dt>
            <dd><?= $punktid ?></dd>
            <dt>Avalik:</dt>
            <dd><?= $avalik ?></dd>
            <dt>Kommentaarid:</dt>
            <dd><?= $kommentaarid ?></dd>
            <dt>Otsus:</dt>
            <dd><?= $otsus ?></dd>
        </dl>
        <a href='?heaband_id=<?= $id ?>'>Lisa punkt</a><br>
        <a href='?paremband_id=<?= $id ?>'>Lisa 2 punkti</a><br>
        <a href='?parimband_id=<?= $id ?>'>3 punkti juurde</a><br>
        <a href='?viletsband_id=<?= $id ?>' style="color: crimson">1 punkt maha</a><br>
        <form action='?'>
            <input type='hidden'
                   name='uue_kommentaari_id' value='<?= $id ?>'/>
            <label>Lisa kommentaar
                <input type='text' name='uus_kommentaar'/>
            </label>
            <input type='submit' value='Saada'/>
        </form>
        <?php
        $kask->close();
    }
}
?>
<h1>Ansamblid</h1>
<table>
    <?php
    $kask = $yhendus->prepare("SELECT id, ansamblinimi, punktid,kommentaarid FROM ansamblid where avalik=1");
    $kask->bind_result($id, $nimi, $punktid, $kommentaarid);
    $kask->execute();
    while ($kask->fetch()) {
        $nimi = htmlspecialchars($nimi);
        $kommentaarid = nl2br(htmlspecialchars($kommentaarid));
        echo "<tr>
                    <td><a href='?id=$id'>$nimi</a></td>
                    <td>$punktid</td>                   
                  </tr>";
    }
    ?>
</table>