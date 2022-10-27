<?php
$server = "/* serveri aadress */";
$database = "/* andmebaasinimi */";
$user = "/* andmebaasi kasutaja */";
$password = "/* parool */";

$yhendus = new mysqli($server, $user, $password, $database);
if($yhendus->connect_errno){
    echo "Failed to connect to database.";
    exit();
}
$yhendus->set_charset("utf8");
