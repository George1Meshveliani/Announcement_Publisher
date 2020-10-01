<header>
  <nav class="navbar sticky-top" id="header">
    <?php
    session_start();
    if (isset($_SESSION["loggedin"])  || isset($_COOKIE["PHTARM"])) {
      echo ' <a href="index.php">Home</a>
            <div class="navbar-right">
              <a href="create.php">Add announcenment</a>
              <a class="active" href="profile.php">Profile</a>
              <a href="logout.php">Logout</a>
            </div>';
    } else {
      echo '<a href="index.php">Home</a>
           <div class="navbar-right">
            <a href="create.php">Add announcenment</a>
            <a href="login.php">LogIn</a>
            <a href="register.php">Signup</a>
           </div>';
    };
    ?>
  </nav>
</header>