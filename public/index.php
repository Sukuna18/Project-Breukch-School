<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/list','StudentController@index');
$app->router->get('/','StudentController@Login');
$app->router->post('/list','StudentController@index');
$app->router->get('/edit','StudentController@edit');
$app->router->get('/add','StudentController@add');
$app->router->get('/annee','StudentController@Annee');
$app->router->get('/class','StudentController@Classe');
$app->router->post('/add','StudentController@addStudent');

$app->run();
