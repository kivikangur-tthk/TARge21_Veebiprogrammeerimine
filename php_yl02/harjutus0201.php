<?php
echo 'Ülesanne 0201<br>
<br>
Genereeri tsükliga 100 täisarvust koosnev massiiv.<br>
Väljasta see "print_r" funktsiooniga.<br>';
for ($i = 0; $i < 100; $i++) {
    $arvud[] = rand();
}
?>
<pre><?php print_r($arvud); ?>
</pre>