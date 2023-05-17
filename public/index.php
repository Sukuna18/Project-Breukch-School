<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/list','StudentController@index');
$app->router->get('/','StudentController@Login');
$app->router->post('/list','StudentController@index');

$app->run();
