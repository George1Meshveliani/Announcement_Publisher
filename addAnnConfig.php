<?php


require_once "layout/header.php"; 
 require_once "server/userData.php";
 require_once "server/config.php";
//This page is ready to give user opportunity to make announcements and publish it to homepage
session_start();
// check id user is logged in
if (isset($_COOKIE["PHTARM"])) {
} elseif (!isset($_SESSION["loggedin"])) {
    header("Location:login.php");
}

$current_user = array_filter($user_data, function ($var) {
    return ($var["id"] === $_COOKIE["PHTARM"] || $var["id"] == $_SESSION["id"]);
  });
  $current_user = array_values(array_filter($current_user));
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php require_once "layout/header.php"  ?>
    <main class="main-container">
        <h1>announcenment page</h1>
        <h6>Hello, <?php echo $current_user[0]["fullname"]  ?> You can create and publich an announcement here</h6>
    </main>
    <?php require_once "layout/footer.php"  ?>

</body>

</html>