<?php
function deleteData(){
    require_once "server/config.php";
    if(isset($_POST["submit"])){
        $id = explode("/", $_SERVER['PATH_INFO']);
        $sql = "DELETE FROM employees WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id[2]]);
        header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
    }
}
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

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h1>Delete Record</h1>
                    </div>
                    <form method="post">
                        <div class="alert alert-danger fade in">
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger" name="submit">
                                <a href="http://localhost/announcement/Announcement_Publisher/index.php/" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>