<?php

namespace App\Controller;
use Core\Controller;
use App\Model\AnneeModel;

class AnneeController extends Controller
{
   public function annee(){
         $this->render('AnneeScholaire/Annee.php', [
              'title' => 'Classe',
         ]);
   }
}