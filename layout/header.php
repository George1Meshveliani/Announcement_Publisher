<header>
  <nav class="navbar sticky-top topnav" id="header">
    <?php
    session_start();
    if (isset($_SESSION["id"])  || isset($_COOKIE["PHTARM"])) {
      echo ' <a href="http://localhost/announcement/Announcement_Publisher/index.php/">Home</a>
            <div class="navbar-right">
              <a href="http://localhost/announcement/Announcement_Publisher/index.php/create">Add announcenment</a>
              <a class="active" href="http://localhost/announcement/Announcement_Publisher/index.php/profile">Profile</a>
              <a href="http://localhost/announcement/Announcement_Publisher/index.php/logout">Logout</a>
            </div>';
    } else {
      echo '<a href="http://localhost/announcement/Announcement_Publisher/index.php/">Home</a>
           <div class="navbar-right">
            <a href="http://localhost/announcement/Announcement_Publisher/index.php/create">Add announcenment</a>
            <a href="http://localhost/announcement/Announcement_Publisher/index.php/login">LogIn</a>
            <a href="http://localhost/announcement/Announcement_Publisher/index.php/register">Signup</a>
           </div>';
    };
    ?>
  </nav>
</header>