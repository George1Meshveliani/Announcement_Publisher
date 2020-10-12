<?php

define('FUNCTIONS_PATH', dirname(__DIR__) . "/src");


$routes=[];


/**
 * Register a function on a path.
 *
 * @param $path
 * @param $function
 */
function registerRoute($path, $function) {
    global $routes;
    if (!isset($routes[$path])) {
      $method = explode(':', $function);
  
      $pathArray = explode(':', $path);
      if(count($pathArray) > 1) {
        $pathInfoArray = explode("/", $path);
        // print_r($pathInfo);
        if(count($pathInfoArray) > 2) {
          $routes[$path] = [
            'file_name' => $method[0] . '.php',
            'function_name' => $method[1],
            'param' => $pathInfoArray[2]
          ];
        }
      } else {
        $routes[$path] = [
          'file_name' => $method[0] . '.php',
          'function_name' => $method[1],
        ];
      }
    }
    // print_r($routes);
 
    return $routes;
  }
  
  /**
   * Execute function based on its registered route.
   * @param $path
   *   Url path of the request.
   */
  function executeRoute($path) {
    global $routes;
  
    // Check if this path is registered in the router.
    if (!isset($routes[$path])) {
      echo "No route registered for path: " . $path;
      // header("Location:http://localhost/announcement/Announcement_Publisher/index.php/");
      exit(1);
    }
    
    $function_file = FUNCTIONS_PATH . '/' . $routes[$path]['file_name'];
    if (!file_exists($function_file)) {
      echo "File $function_file doesn't exist.";
      exit(1);
    }
    
    include_once $function_file;
    
    $function = $routes[$path]['function_name'];
   
    // Check if function exists for this path.
    if (!function_exists($function)) {
      echo "No function registered for path: " . $path;
      exit(1);
    }
    if(array_key_exists('param', $routes[$path])) {
      $function($routes[$path]['param']);
    } else {
      $function();
    }
  }
  
  