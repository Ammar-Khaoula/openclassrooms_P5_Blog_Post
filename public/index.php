<?php

use Src\Exceptions\NotFoundException;
use Router\Router;

require "../vendor/autoload.php";

// define global variable to get the strict path
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

//instantiate Router object 
$router = new Router($_GET['url']);

//posts Controllers
$router->get('/', 'Src\Controllers\PostController@getAllPost');
$router->get('/post', 'Src\Controllers\PostController@getPostById');


try{
    $router->run();
} catch(NotFoundException $e){
    return $e->error404();
}