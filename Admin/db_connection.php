<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "online_test";

$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}





?>