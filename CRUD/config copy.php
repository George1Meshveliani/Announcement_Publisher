<?php
/* Change it by your parametares */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'george1');
define('DB_PASSWORD', 'passWW123!aaaddd');
define('DB_NAME', 'userregistration');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
