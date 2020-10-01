<?php
session_start();
require_once "CRUD/config.php";

$id = "";
if (isset($_COOKIE["PHTARM"])) {
  $id = $_COOKIE["PHTARM"];
} else if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
}
// get currently logged user from mysql with session or cookie 
$res = "SELECT * FROM employees WHERE id = "  . $id;
$result = mysqli_query($link, $res);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/HeaderDesign.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require_once "pubs.php" ?>
    <?php require_once 'layout/header.php'; ?>
    <main class="main-container">
        <div class="card-columns">
            <div class="card rounded p-2">
                <div class="card-header">
                    Title
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?php echo $row["name"] ?>.</p>
                        <footer class="blockquote-footer">Contact info
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="card rounded p-2">
                <div class="card-header">
                    Title
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Contact info
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="card rounded p-2">
                <div class="card-header">
                    Title
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Contact info
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="card rounded p-2">
                <div class="card-header">
                    Title
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Contact info
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="card rounded p-2">
                <div class="card-header">
                    Title
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">Contact info
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </main>
    <?php require_once "layout/footer.php" ?>
</body>

</html>