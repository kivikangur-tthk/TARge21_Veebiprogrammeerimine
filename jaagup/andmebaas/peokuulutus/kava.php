<?php
require("../dbConfig.php"); // hoida väljaspool veebist kättesaadavat teekonda
global $yhendus;
?>
    <!doctype html>
    <html>
    <head>
        <title>Peokava</title>
        <style>
            #menyykiht {
                float: left;
                padding-right: 30px;
            }

            #sisukiht {
                float: left;
            }

            #jalusekiht {
                clear: left;
            }
        </style>
    </head>
    <body>
    <div id="menyykiht">
        <h2>Etteasted/Sündmused</h2>
        <ul>
            <?php
            $kask = $yhendus->prepare("SELECT id, nimetus, algus FROM `etteasted` ORDER by algus");
            $kask->bind_result($id, $nimetus, $algus);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<li>" . date_format(date_create($algus), "d.m.Y H:i") . "<a href='?id=$id'>" . htmlspecialchars($nimetus) . "</a></li>";
            }
            ?>

        </ul>
    </div>
    <div id="sisukiht">
        <?php
        if (isset($_REQUEST["id"])) {
            $kask = $yhendus->prepare("SELECT id, nimetus, kirjeldus, algus FROM etteasted WHERE id=?");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $nimetus, $kirjeldus, $algus);
            $kask->execute();
            if ($kask->fetch()) {
                $algusAeg = date_create($algus);
                echo "<h2>" . date_format($algusAeg, "d.m.Y H:i") . " " . htmlspecialchars($nimetus) . "</h2>";
                echo htmlspecialchars($kirjeldus);
            } else {
                echo "Vigased andmed.";
            }
        }
        ?>

    </div>
    <div id="jalusekiht">
        Lehe tegi Kristjan
    </div>
    </body>
    </html>
<?php
$yhendus->close();
?>