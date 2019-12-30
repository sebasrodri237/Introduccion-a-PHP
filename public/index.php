<?php
/*Como desarrolladores se debe evitar ataques tipo XSS*/
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
$map->get('addJobs', '/cursophp/jobs/add',[

    'controller'=> 'App\Controllers\JobsController',
    'action'=> 'getAddJobAction'
]);
$map->post('saveJobs', '/cursophp/jobs/add',[

    'controller'=> 'App\Controllers\JobsController',
    'action'=> 'getAddJobAction'
]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function printJob($job) {
    // if($job->visible == false) {
    //   return;
    // }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job->title. '</h5>';
    echo '<p>' . $job->description. '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }

  function printProject($project) {
    // if($job->visible == false) {
    //   return;
    // }

echo '<div class="project">';
        echo '<h5>' . $project->title.'</h5>';
        echo '<div class="row">';
        echo '<div class="col-3">';
            echo '<img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">';
            echo '</div>';
            echo '<div class="col">';
            echo '<p>' . $project->description. '</p>';
            echo '<strong>Technologies used: </strong>';
            echo '<span class="badge badge-secondary">HTML</span>';
            echo '<span class="badge badge-secondary">CSS</span>';
            echo '<span class="badge badge-secondary">Javascript</span>';
            echo '</div>';
    echo '</div>';
echo '</div>';
  }

if(!$route){

    echo 'NO route';
}else{

    $handlerData = $route->handler; 
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller-> $actionName($request);
}
