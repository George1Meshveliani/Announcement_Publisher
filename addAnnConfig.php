<?php


require_once "server/userData.php";
require_once "server/config.php";
//This page is ready to give user opportunity to make announcements and publish it to homepage
session_start();
// check if user is logged in
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
</body>
<?php require_once "layout/header.php"  ?>
<main class="main-container">
  <h1>announcenment page</h1>
  <h6>Hello, <?php echo $current_user[0]["fullname"]  ?>
    You can create and publich an announcement here</h6>
  <div class="wrapper">
    <div>
      <header class="header">
        <h1 id="title" class="text-center">Make an announcement</h1>
      </header>
      <form class="generalFom">
        <div class="form-group">
          <label id="name-label" for="name">Title</label>
          <input type="text" name="name" id="name" class="form-control" required />
        </div>
      </form>
    </div>

    <div class="generalFom">
      <p>რას საქმიანობთ?</p>
      <select id="dropdown" name="role" class="form-control" required>
        <option value="teacher">Teacher</option>
        <option value="craf">Craftsman</option>
        <option value="babysister">Babysister</option>
      </select>
    </div>


    <div class="generalFom">
      <p required>Write your announcement</p>
      <textarea class="input-textarea"></textarea>
    </div>

    <div class="button1">
      <button type="submit" id="submit" class="submit-button">
        Publish
      </button>
    </div>
    </form>
  </div>
  </div>


</main>
<?php require_once "layout/footer.php"  ?>


</body>

</html>