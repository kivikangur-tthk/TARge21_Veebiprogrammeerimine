<pre>
Ülesanne 0305
Teha funktsioon nimega "string_info". Funktsiooni sisendargumendiks olgu teksti string ($string). Funktsioon üleb: ,
1. Mis on selle stringi esimene täht ja viimane täht. Funkts. "strlen" leiab stringi pikkuse ja "echo $string[0]" kuvab esimese tähe.
2. Mitu tähte stringis on (strlen).
3. Kogu string tehaks läbiva väiketähega (strtolower) ja väljastatakse.
4. Kogu string tehaks läbiva suurtähega (strtoupper) ja väljastatakse.
5. Tsükliga loetakse kokku ja kuvatakse ekraanile mitu "a" tähte stringis esineb.
</pre>
<?php
function string_info($string)
{
    $result["firstLetter"] = $string[0];
    $result["lastLetter"] = $string[-1];
    $result["length"] = strlen($string);
    $result["lower"] = strtolower($string);
    $result["upper"] = strtoupper($string);
    $charCount = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] === "a") {
            $charCount++;
        }
    }
    $result["a_count"] = $charCount;
    return $result;
}
echo "<pre>";
var_dump(string_info("jaanalinnud"));
echo "</pre>";





