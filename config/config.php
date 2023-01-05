<?php
date_default_timezone_set("ASIA/JAKARTA");

require_once "database.php";

$mysqli = new mysqli($con['host'], $con['user'], $con['pass'], $con['db']);

if ($mysqli->connect_error) {
    die('Connection failed! : '.$mysqli->connect_error);
}
?>