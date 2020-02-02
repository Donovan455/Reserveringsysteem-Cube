<?php
//define server
$dbServername   = "localhost";

//define database username
$dbUsername     = "root";

//define database password
$dbPassword     = "";

//define database name
$dbName         = "cube_system";

//attempt to connect to the database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die ('Could not connect:' . mysqli_error());
}