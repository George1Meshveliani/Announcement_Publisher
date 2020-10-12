<?php
function getHomePage(){
    session_start();
    // $data = [];
    // require_once "server/config.php";
    // $stmt = $pdo->query("SELECT * FROM users");
    // while ($row = $stmt->fetch()) {
    //     array_push($data, $row);
    // }
    // return $data;
    return [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="icon" type="image/png" href="https://freepngimg.com/download/newspaper/6-2-newspaper-png-clipart.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="../js/index.js" defer></script>
</head>

<body>
    <?php require_once 'layout/header.php'; ?>
    <main class="main-container">
        <div class="wrapper wraper-table res">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix">
                            <h2 class="pull-left">Publication</h2>
                            <a href="http://localhost/announcement/Announcement_Publisher/index.php/create" class="btn btn-success pull-right">Add New </a>
                        </div>
                        <?php
                         session_start();
                        
                        require_once "server/config.php";
                            $stmt = $pdo->query("SELECT * FROM employees");
                            $dataCount = $stmt->rowCount();
                            if (count($dataCount) > 0) {
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Name</th>";
                                echo "<th>Announcement</th>";
                                echo "<th>Salary</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = $stmt->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    // show update and delete buttons only for announcenments author
                                    if ($_SESSION["id"] == $row["id"] || $_COOKIE["PHTARM"] == $row["id"]) {
                                        echo "<td>";
                                        echo "<a href='http://localhost/announcement/Announcement_Publisher/index.php/read/" . $row['user_id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "<a href='http://localhost/announcement/Announcement_Publisher/index.php/update/" . $row['user_id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='http://localhost/announcement/Announcement_Publisher/index.php/delete/" . $row['user_id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td>";
                                        echo "<a href='http://localhost/announcement/Announcement_Publisher/index.php/read/" . $row['user_id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>