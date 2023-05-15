<?php
session_start();

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Utils\View;

require '../vendor/autoload.php';

$router = new AltoRouter();

$router->map( 'GET', '/', [HomeController::class, 'index']);
$router->map( 'GET', '/user/[i:id]/edit', [UserController::class, 'edit'], 'user.edit');
$router->map( 'POST', '/user/[i:id]/update', [UserController::class, 'update'], 'user.update');
$router->map( 'GET', '/user/index', [UserController::class, 'index'], 'user.index');
$router->map( 'GET', '/connexion', [AuthController::class, 'connexion'], 'connexion');
$router->map( 'POST', '/connexion', [AuthController::class, 'connect'], 'connect');
$router->map( 'GET', '/inscription', [AuthController::class, 'inscription'], 'inscription');
$router->map( 'POST', '/register', [AuthController::class, 'register'], 'register');

$match = $router->match();

if($match) {
    $target = $match['target'];
    $controller = $target[0];
    $methode = $target[1];

    $controller = new $controller();
    $params = $match['params'];

    call_user_func_array([$controller, $methode], $params);
}else {
    View::render('error');
}







