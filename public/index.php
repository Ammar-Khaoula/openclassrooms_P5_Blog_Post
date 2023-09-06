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

// Users controllers
$router->get('/signup', 'Src\Controllers\UserController@signup');
$router->post('/signup', 'Src\Controllers\UserController@signupPost');
$router->get('/login', 'Src\Controllers\UserController@login');
$router->post('/login', 'Src\Controllers\UserController@loginPost');
$router->get('/logout', 'Src\Controllers\UserController@logout');

//admin controllers
$router->get('/admin/posts', 'Src\Controllers\AdminController@getAllPosts');
$router->get('/admin/createPost', 'Src\Controllers\AdminController@create');
$router->post('/admin/addPost', 'Src\Controllers\AdminController@createPost');//
$router->post('/admin/deletePost',     'Src\Controllers\AdminController@destroyPost');
$router->get('/admin/editPost',     'Src\Controllers\AdminController@editPost');
$router->post('/admin/updatePost',     'Src\Controllers\AdminController@updatePost');
$router->get('/admin/listUsers', 'Src\Controllers\AdminController@getAllUsers');
$router->post('/admin/listUsers', 'Src\Controllers\AdminController@validat');
$router->get('/profil', 'Src\Controllers\AdminController@profil');
$router->post('/profil', 'Src\Controllers\AdminController@sendMessage');
$router->get('/admin/editProfil', 'Src\Controllers\AdminController@editProfil');
$router->post('/admin/editProfil', 'Src\Controllers\AdminController@updateProfil');
$router->get('/admin/listComment', 'Src\Controllers\AdminController@getAllComment');
$router->post('/admin/listComment', 'Src\Controllers\AdminController@validatComment');

// comment
$router->get('/post/createComment', 'Src\Controllers\postController@createComments');
$router->post('/post/createComment', 'Src\Controllers\postController@createComment');//
$router->get('/post/editComment',     'Src\Controllers\postController@commentbById');
$router->post('/post/updateComment',     'Src\Controllers\postController@updateComment');
$router->post('/post/delete',     'Src\Controllers\PostController@destroyComment');


try{
    $router->run();
} catch(NotFoundException $e){
    return $e->error404();
}