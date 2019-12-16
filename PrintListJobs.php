<?php

require_once 'vendor\autoload.php';

use App\Models\{job, project};


// $job1 = new job('Web Developer',
//                 'Let me create your websites for individual, startup or company/store/business.',
//                 14,
//                 true);

// $job2 = new job('Wordpress Dev',
//                 'Let me create your websites for individual, startup or company/store/business with the great content management system Wordpress, more easy and quickly.',
//                 2,
//                 true);

// $job3 = new job('PHP',
//                 'Fundamental skills about PHP for backend developer.',
//                 1,
//                 false);

// $job4 = new job('Javascript',
//                 'Javascript developer frontend and backend.',
//                 5,
//                 true);

// $job5 = new job('Data Base',
//                 'Fundamental skills about relational data base.',
//                 1,
//                 false);

$jobs = job::all();/*Metodo de acceso para utilziar Elocuent
y obtener los registros que encuentre*/

$project1 = new project('Project 1' ,'Description 1' ,0 ,true);

$projects = [

  $project1
];

  function printElement($job){/*Todo lo que llegue a esta funcion
    debe cumplir con la interfaz printable, permitiendo validar el tipo de dato 
    que debe llegar ya sea cadenas, enteros.. etc*/ 

    // if($job->visible == false){

    //   return;
    // }
      // continue; continua a la siguiente iteacion
      //break; Sale completamente del ciclo
    echo '<li class="work-position">';
    echo '<h5>'.$job->title.'</h5>';
    echo '<p>'.$job->description.'</p>';
    echo '<p>'.$job->getDurationAsString().'</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo'</ul>';
    echo '</li>';    
    }  
?>