<?php
// retrieve usernames from database,  for fetch from index.js
require_once "config.php";
$usernames = [];

$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    array_push($usernames, $row["username"]);
    array_push($usernames, $row["email"]);
}
echo json_encode($usernames);
