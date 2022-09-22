<pre>Ülesanne 0202

Lisa käsitsi massiivi 10 looma nime kasutades massiivi kohanäitu. Nt. $mas[0]="karu" jne.
Väljasta see "foreach" tsükkliga.</pre>
<?php

$loomad[0] = "Karu";
$loomad[1] = "Koer";
$loomad[2] = "Kass";
$loomad[3] = "Lehm";
$loomad[4] = "Hobune";
$loomad[5] = "Lammas";
$loomad[6] = "Kits";
$loomad[7] = "Siga";
$loomad[8] = "Saarmas";
$loomad[9] = "Alpaka";

foreach ($loomad as $loom) {
    echo "$loom<br>";
}

