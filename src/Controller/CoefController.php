<?php

namespace App\Controller;
use Core\Controller;

class CoefController extends Controller{
  public function index(){
    $this->render("Coefficient/Coefficient.html.php",[
      'Styles' => 'styles/Coef.css',
    ]);
  }
}