<?php
function createAnnouncenment(){
    session_start();
    require_once "server/config.php";
    if (isset($_COOKIE["PHTARM"])) {
    } elseif (!isset($_SESSION["id"])) {
      header("Location:http://localhost/announcement/Announcement_Publisher/index.php/login");
    }
    if (isset($_COOKIE["PHTARM"])) {
      $id = $_COOKIE["PHTARM"];
    } elseif (isset($_SESSION["id"])) {
      $id = $_SESSION["id"];
    }
    if(isset($_POST["submit"])){
      $name = $_POST["name"];
      $body = $_POST["body"];
      $salary = $_POST["salary"];
      if(empty($_POST["name"]) || empty($_POST["body"]) || empty($_POST["salary"])){
        echo "fill all fields";
      }else {
        # INSERT DATA
        $sql = "INSERT INTO employees (id ,name, address, salary) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id,$name,$body,$salary]);
        header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create</title>
  <link rel="icon" type="image/png" href="https://freepngimg.com/download/newspaper/6-2-newspaper-png-clipart.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/index.js" defer></script>
</head>

<body>
<?php require_once "layout/header.php"  ?>
  <main class="main-container">
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div>
              <h2>Create Announcement</h2>
            </div>
            <p>Please fill this form and submit to add employee record to the database.</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Announcement</label>
                <textarea name="body" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control" autocomplete="off">
              </div>
              <input type="submit" class="btn btn-primary" value="Submit" name="submit">
              <a href="http://localhost/announcement/Announcement_Publisher/index.php/profile" class="btn btn-default">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

</body>

</html>