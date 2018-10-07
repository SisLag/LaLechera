
<?php

$server   = "127.0.0.1";
$username = "root";
$password = "root";
$database = "lalechera";


$mysqli = new mysqli($server, $username, $password, $database);



if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?>