<?php
//Require DB settings with connection variable
require_once "dbh.inc.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM afspraken";

$result = mysqli_query($conn, $query)
or die('Error'. mysqli_error($conn));

//Loop through the result to create a custom array
$reservation = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservation[] = $row;
}

//Close connection
mysqli_close($conn);