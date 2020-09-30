<?php
session_start();
require_once "server/config.php";
$id = "";
if (isset($_COOKIE["PHTARM"])) {
  $id = $_COOKIE["PHTARM"];
} elseif (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
}
// get currently logged user from mysql with session or cookie 
$res = "SELECT * FROM users WHERE id=" . $id;
$result = mysqli_query($link, $res);
$userRow = mysqli_fetch_array($result);
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
  <?php require_once 'layout/header.php'; ?>
  <main class="main-container">
    <div class="profile-container">
      <section class="rounded profile">
        <div class="page-header">
          <h5>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h5>
          <h6>Name: <?php echo $userRow["username"]  ?></h6>
          <h6>Fullname: <?php echo $userRow["fullname"]  ?></h6>
          <h6>E-mail: <?php echo $userRow["email"]  ?></h6>
        </div>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        <a href="editProfile.php" class="card-link">edit</a>
      </section>
      <section class="rounded ann-container">
        <h4>my announcenments</h4>
        <a href="addAnnConfig.php">add new</a>
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Title</h5>
            <h6 class="card-subtitle mb-2 text-muted">saxeli gvari</h6>
            <p class="card-text">gancxadebis shinaarsi</p>
            <a href="#" class="card-link">edit</a>
            <a href="#" class="card-link">delete</a>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Title</h5>
            <h6 class="card-subtitle mb-2 text-muted">saxeli gvari</h6>
            <p class="card-text">gancxadebis shinaarsi</p>
            <a href="#" class="card-link">edit</a>
            <a href="#" class="card-link">delete</a>
          </div>
        </div>
      </section>
    </div>
  </main>
  <?php require_once "layout/footer.php" ?>
</body>

</html>