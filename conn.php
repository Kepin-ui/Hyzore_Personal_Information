<?php

$host = "your db host";
$user = "your db username";
$password = "your db password";
$db = "your db name";

$conn = mysqli_connect($host, $user, $password, $db) or die("Database tidak ditemukan");

?>