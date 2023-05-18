<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/list','StudentController@index');
$app->router->get('/','StudentController@Login');
$app->router->post('/list','StudentController@index');
$app->router->get('/edit','StudentController@edit');
$app->router->get('/add','StudentController@add');

$app->run();
