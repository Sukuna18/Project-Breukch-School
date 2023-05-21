<?php

namespace App\Controller;
use Core\Controller;
use App\Model\AnneeModel;

class AnneeController extends Controller
{
      private $anneeModel;

      public function __construct()
      {
          $this->anneeModel = new AnneeModel();
      }
      public function index(){
            $annees = $this->anneeModel->getAllAnnees();
            $this->render('AnneeScholaire/Annee.php', [
              'title' => 'Classe',
                  'annees' => $annees
            ]);
      }
      public function addAnnee(){
            $libelle = $_POST['libelle'];
            $this->anneeModel->insertAnnee($libelle);
            header('Location: /annee');
      }
      public function deleteAnnee($params){
            $id = $params[0];
            $this->anneeModel->deleteAnnee($id);
            header('Location: /annee');
      }
}