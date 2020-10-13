<?php
// php error logs
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'lib/routing.php';

// print_r($_SERVER);
// $id = explode("/", $_SERVER['PATH_INFO']);
// Register routes.
registerRoute('/', 'home:getHomePage');
registerRoute('/register', 'register:registerUser');
registerRoute('/login', 'login:loginUser');
registerRoute('/read/{id}', 'read:readInfo');
registerRoute('/update/{id}', 'update:updateData');
registerRoute('/delete/{id}', 'delete:deleteData');
registerRoute('/logout', 'logout:logoutUser');
registerRoute('/create', 'create:createAnnouncenment');
registerRoute('/profile', 'profile:showProfile');
registerRoute('/edit', 'edit_profile:editProfile');
registerRoute('/error', 'error:showError');

// Execute the function on the path.
executeRoute($_SERVER['PATH_INFO']);
// print_r($_SERVER);