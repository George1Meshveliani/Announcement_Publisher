<?php
function updateData(){
    require_once "server/config.php";
    // get current announcenment data
    $id = explode("/", $_SERVER['PATH_INFO']);
    $sql = "SELECT * FROM employees WHERE user_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id[2]]);
    $data = $stmt->fetch();
    // update data
    if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $sql = 'UPDATE employees SET name=?, address=?, salary=? WHERE user_id=? ';
     $stmt = $pdo->prepare($sql);
     $stmt->execute([$name,$address,$salary, $id[2]]);
     header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
    
    }
    return $data;
}
$data = updateData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="icon" type="image/png" href="https://freepngimg.com/download/newspaper/6-2-newspaper-png-clipart.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/index.js" defer></script>

</head>

<body>
    <?php require_once "layout/header.php" ?>
    <main class="main-container">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h2>Update Record</h2>
                        </div>
                        <p>Please edit the input values and submit to update the record.</p>
                        <form  method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $data["name"] ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"><?php echo $data["address"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" name="salary" class="form-control"  autocomplete="off" value="<?php echo $data["salary"] ?>">
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