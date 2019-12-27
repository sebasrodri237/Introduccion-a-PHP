<?php

/*Para que php nos muestre los 
errores en pantalla, xampp ya lo tiene activo 
pero en otros servidores puede que no*/
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;



$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/cursophp/',[

    'controller'=> 'App\Controllers\IndexController',
    'action'=> 'indexAction'
]);
$map->get('addJobs', '/cursophp/jobs/add','../addJob.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if(!$route){

    echo 'NO route';
}else{

    $handlerData = $route->handler; 
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller-> $actionName();
}
