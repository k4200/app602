<?php
ini_set( “display_errors”, E_ALL);

function add_include_path ($path) {
  foreach (func_get_args() AS $path)  {
    $paths = explode(PATH_SEPARATOR, get_include_path());

    if (array_search($path, $paths) === false)
      array_push($paths, $path);

    set_include_path(implode(PATH_SEPARATOR, $paths));
  }
}

add_include_path(__DIR__);
add_include_path(__DIR__  . '/zf');

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();

$autoloader->registerNamespace('A602_');

