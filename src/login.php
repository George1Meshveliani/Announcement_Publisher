<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
    exit();
}
function loginUser(){
    require_once "server/config.php";
    if(isset($_POST["submit"])){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        if(empty($_POST["username"]) || empty($_POST["password"])){
            header("http://localhost/announcement/Announcement_Publisher/index.php/login");
        }
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $username]);
        $data = $stmt->fetchAll();
        $dataCount = $stmt->rowCount();
            if($dataCount > 0 && !empty($data)){
                if (password_verify($password, $data[0]["password"])) {
                $_SESSION["id"] = $data[0]["id"];
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = true;
                if (isset($_POST["check"])) {
                    $expires = time() + 3600;
                    setcookie("PHTARM", $_SESSION["id"], $expires, "/");
                } else {
                    $expires = time() + 1;
                    setcookie("PHTARM", $_SESSION["id"], $expires, "/");
                }
                header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
                }else{
                    echo "password is incorect";
                }
            }else{
                echo "no user found";
                // header("Location:http://localhost/announcement/Announcement_Publisher/index.php/login");
            }
            
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/png" href="https://freepngimg.com/download/newspaper/6-2-newspaper-png-clipart.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/index.js" defer></script>
    
</head>

<body>
    <?php require_once 'layout/header.php'; ?>
    <main class="main-container">
        <div class="wrapper wrapper-form">
            <div class="form-title">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
            </div>
            <form class="generalFom" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="name" placeholder="E-mail/username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group check">
                    <input type="checkbox" name="check" id="check">
                    <label for="check">Remember me</label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login" name="submit">
                </div>
                <p>Don't have an account? <a href="http://localhost/announcement/Announcement_Publisher/index.php/register">Sign up now</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>