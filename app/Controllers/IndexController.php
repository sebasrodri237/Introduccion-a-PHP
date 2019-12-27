<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController{

    public function indexAction(){

        $jobs = Job::all();/*Metodo de acceso para utilziar Elocuent
        y obtener los registros que encuentre*/
        $projects = Project::all();

        $name = 'Sebastian Rodriguez Ardila';
        $limitMonths = 2000;

        include '../views/index.php';
    }
}