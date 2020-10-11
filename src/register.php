<?php
function registerUser(){
require_once "server/config.php";
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $fullnmae = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (empty($_POST["username"]) || empty($_POST["fullname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirm_password"])) {
            echo "wtf";
            header("Location:http://localhost/announcement/Announcement_Publisher/index.php/register");
        } else {
            // INSERT POST DATA
            $sql  = "INSERT INTO users(username, fullname, email, password) VALUES(?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $hashed_password =  password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$username,$fullnmae,$email,$hashed_password]);
            header("Location:http://localhost/announcement/Announcement_Publisher/index.php/login");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
                <h2>Sign Up</h2>
                <p>Please fill this form to create an account.</p>
            </div>
            <form class="generalFom" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="newUser" placeholder="name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="fullname" class="form-control" placeholder="fullname" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" placeholder="confirm password">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a href="http://localhost/announcement/Announcement_Publisher/index.php/login">Login here</a>.</p>
            </form>
        </div>
    </main>
</body>

</html>