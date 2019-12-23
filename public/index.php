<?php

/*Para que php nos muestre los 
errores en pantalla, xampp ya lo tiene activo 
pero en otros servidores puede que no*/
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

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

$route = $_GET['route'] ?? '/';/* Si esta definido y tiene un valor */

if($route == '/'){

    require '../index.php';
}elseif($route == 'addJob'){

    require '../addJob.php';
}