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
  <?php require_once "server/userData.php" ?>
  <?php
  require_once "server/config.php";
  session_start();
  // filter currently logged user from mysql with session or cookie 
  $current_user = array_filter($user_data, function ($var) {
    return ($var["id"] === $_COOKIE["PHTARM"] || $var["id"] == $_SESSION["id"]);
  });
  $current_user = array_values(array_filter($current_user));


  ?>

  <main class="main-container">
    <div class="profile-container">
      <section class="profile">
        <div class="page-header">
          <h5>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h5>
          <h6>Name: <?php echo $current_user[0]["username"]  ?></h6>
          <h6>Fullname: <?php echo $current_user[0]["fullname"]  ?></h6>
          <h6>E-mail: <?php echo $current_user[0]["email"]  ?></h6>
        </div>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
      </section>
      <section class="ann-container">
        <h4>my announcenments</h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.

        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
      </section>
    </div>
  </main>
  <?php require_once "layout/footer.php" ?>
</body>

</html>