<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/list','StudentController@index');
$app->router->get('/','StudentController@Login');
$app->router->get('/edit/:id','StudentController@edit');
$app->router->get('/add','StudentController@add');
$app->router->get('/class','ClasseController@index');
$app->router->post('/add','StudentController@addStudent');
// $app->router->post('/add/:id','StudentController@addStudentClasses');
$app->router->post('/edit/:id','StudentController@updateStudent');
$app->router->get('/delete/:id','StudentController@deleteStudent');
$app->router->post('/class','ClasseController@addClasse');
$app->router->get('/class/:id','ClasseController@deleteClasse');
$app->router->get('/annee', 'AnneeController@index');
$app->router->post('/annee', 'AnneeController@addAnnee');
$app->router->get('/annee/:id', 'AnneeController@deleteAnnee');
$app->router->get('/annee/active/:id', 'AnneeController@activeAnnee');
$app->router->get('/classjs', 'StudentController@getAllClasses');
$app->router->get('/niveaujs', 'StudentController@getAllNiveaux');

$app->run();
