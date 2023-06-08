<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app->router->get('/niveau', 'NiveauController@index');
$app->router->get('/niveau/classe/:id', 'ClasseController@renderClassById');
$app->router->get('/class/liste/:id','StudentController@index');
$app->router->get('/class/liste','StudentController@upload');
$app->router->get('/','StudentController@Login');
$app->router->get('/class/liste/edit/:id','StudentController@edit');
$app->router->get('/add','StudentController@add');
$app->router->get('/class','ClasseController@index');
$app->router->post('/add','StudentController@addStudent');
$app->router->post('/class/liste/edit/:id','StudentController@updateStudent');
$app->router->get('/delete/:id','StudentController@deleteStudent');
$app->router->post('/class','ClasseController@addClasse');
$app->router->get('/class/:id','ClasseController@deleteClasse');
$app->router->get('/annee', 'AnneeController@index');
$app->router->post('/annee', 'AnneeController@addAnnee');
$app->router->get('/annee/:id', 'AnneeController@deleteAnnee');
$app->router->get('/annee/active/:id', 'AnneeController@activeAnnee');
$app->router->get('/classjs', 'StudentController@getAllClasses');
$app->router->get('/niveaujs', 'StudentController@getAllNiveaux');
$app->router->get('/discipline/gestion', 'DisciplineController@index');
$app->router->post('/discipline/gestion', 'DisciplineController@addDiscipline');
$app->router->post('/discipline/gestion/groupe', 'DisciplineController@addGroupeDiscipline');
$app->router->get('/groupediscjs', 'DisciplineController@getAllGroupeDiscipline');
$app->router->get('/disciplinejs', 'DisciplineController@getAllDiscipline');
$app->router->post('/discipline/gestion/delete', 'DisciplineController@deleteDiscipline');
$app->router->get('/coef', 'CoefController@index');

$app->run();
