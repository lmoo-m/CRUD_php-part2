<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dbschool";

$db = mysqli_connect($host, $user, $password, $dbname);

if (!$db) {
    die();
}
