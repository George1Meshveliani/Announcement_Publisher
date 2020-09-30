<?php
// retrieve usernames from database
require_once "config.php";
$user_data = [];
$usernames = [];
$data = "SELECT * FROM users;";
$result = mysqli_query($link, $data);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($usernames, $row["username"]);
        array_push($usernames, $row["email"]);
        array_push($user_data, $row);
    }
}
echo json_encode($usernames);
