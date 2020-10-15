<?php

print_r(define("FUNCTION_PATH", dirname(__DIR__) . '/src'));
// Contains routes and corresponding functions
$routes= [];

/**
 * Register function on a path
 *
 * @param $path
 * @param $function
 * @return array[]; //if you wish
 */

function registerRoute($path, $function){
    global $routes;

    //Check if this path is registered
    if(!isset($routes[$path])) {
        $method = (explode(':' , $function));
        $routes[$path] = [
            'file_name' =>  $method[0] . '.php',
            'function_name' => $method[1],

        ];
    }
    return $routes;
}

/**
 * Execute function base on its registered rout;
 * @param $path;
 * Url path of the request;
 */

function executeRoute($path){
    global $routes;
    //Check if this path is registered in the router
    if(!isset($routes[$path])) {
        //  echo "No routes registered for path. " . $path;
        exit(1);
    }

    $function_file = FUNCTION_PATH . '/' . $routes[$path]['file_name'];
    // Check if the file exist
    if(!file_exists($function_file)) {
        echo " File $function_file doesn't exists";
        exit(1);
    }

    // Else
    include_once $function_file;

    // Check if the function exists for the path
    if(!function_exists($routes[$path])){
        //  echo "No function registered for path. " . $path;
        exit(1);
    }

    $routes[$path]();
}