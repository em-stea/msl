
<?php
// si se produce algun error, q aparezca en pantalla
ini_set('display_errors', 1);

$db_host = 'localhost';
$db_name = 'msl_db';
$db_user = 'msl';
$db_pass = 'milmillonesdeeuros';

// de acá para abajo, no tocar

$db_charset = 'UTF8';
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_LOWER,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


$db_dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
// fin config.php