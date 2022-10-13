<pre>Ülesanne 0203
Lisa käsitsi massiivi 10 näitleja nime kasutades massiivi array funktsiooni.
Väljasta see "for" tsükkliga.
</pre>
<?php
$actors = array("Willis", "Ever", "Malmsten", "Norman", "Palmiste", "Kaljujärv", "Pohla", "Võigemast", "Avandi", "Sepp");
for ($i = 0, $count = count($actors); $i < $count; $i++) {
    echo $actors[$i] . "<br>";
}
