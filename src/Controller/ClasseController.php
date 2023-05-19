<?php

namespace App\Controller;

use Core\Controller;
use App\Model\ClasseModel;

class ClasseController extends Controller
{
   public function class(){
         $this->render('Classe.php', [
              'title' => 'Classe',
         ]);
   }
}