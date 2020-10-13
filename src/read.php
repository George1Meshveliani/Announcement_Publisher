<?php
function readInfo(){
    require_once "server/config.php";
    
    $id = explode("/", $_SERVER['PATH_INFO']);
    $sql = "SELECT * FROM employees WHERE user_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id[2]]);
    $data = $stmt->fetch();
    return $data;
}
$data = readInfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="icon" type="image/png" href="https://freepngimg.com/download/newspaper/6-2-newspaper-png-clipart.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/index.js" defer></script>
</head>
<style>

</style>

<body>
    <?php require_once "layout/header.php"  ?>
    
    <main class="main-container">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>View Record</h1>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <p class="form-control-static"><?php  echo $data["name"] ?></p>
                        </div>
                        <div class="form-group">
                            <label>Announcement</label>
                            <p class="form-control-static"><?php  echo $data["address"] ?></p>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <p class="form-control-static"><?php  echo $data["salary"] ?></p>
                        </div>
                        <p><a href="http://localhost/announcement/Announcement_Publisher/index.php/" class="btn btn-primary">Back</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>