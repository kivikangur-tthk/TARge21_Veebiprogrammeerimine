<pre>
Ülesanne 0402
Tee tsükliga 20 checkboxi. Pane neile kõigile oma nimi stiilis box[1], box[2], jne.
Tee tsükliga 20 teksti lahtrit. Pane neile kõigile oma nimi stiilis cell[1], cell[2], jne.
Tee tsükliga 20 radio buttonit. Pane neile kõigile üks nimi "radio" ja erinevad väärtused stiilis value1, value2 jne.
</pre>
<form>
    <table>
        <?php for ($i = 1; $i <= 20; $i++) { ?>
            <tr>
                <td>
                    <input id="box<?= $i ?>" type="checkbox" name="box[<?= $i ?>]">
                    <label for="box<?= $i ?>">Check<?= $i ?></label>
                </td>
                <td>
                    <label for="cell<?= $i ?>">Cell<?= $i ?>:</label>
                    <input id="cell<?= $i ?>" type="text" name="cell[<?= $i ?>]">
                </td>
                <td>
                    <input id="radio<?= $i ?>" type="radio" name="radio" value="value[<?= $i ?>]">
                    <label for="radio<?= $i ?>">radio<?= $i ?></label>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>
