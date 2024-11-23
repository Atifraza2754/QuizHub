<?php

$conn=mysqli_connect("localhost","root","","online_test") or die("Connection fail");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>