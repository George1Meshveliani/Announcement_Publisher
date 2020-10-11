<?php
// php error logs
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'lib/routing.php';

// print_r($_SERVER);
$id = explode("/", $_SERVER['PATH_INFO']);
// print_r($id);
// Register routes.
registerRoute('/', 'home:getHomePage');
registerRoute('/register', 'register:registerUser');
registerRoute('/login', 'login:loginUser');
registerRoute('/read' . '/' . $id[2], 'read:readInfo');
registerRoute('/update' . '/' . $id[2], 'update:updateData');
registerRoute('/update' . '/' . $id[2], 'delete:deleteData');
registerRoute('/logout', 'logout:logoutUser');
registerRoute('/create', 'create:createAnnouncenment');


// Execute the function on the path.
executeRoute($_SERVER['PATH_INFO']);
// print_r($_SERVER);