<?php

namespace App\Controller;

use Core\Controller;
use App\Model\ClasseModel;

class ClasseController extends Controller
{
      private $classeModel;
     public function __construct()
      {
          $this->classeModel = new ClasseModel();
        }
        public function renderClassById($params){
            $annee = $this->classeModel->getAnneeActive();
            $idNiveau = $params[0];
            $niveauId = $this->classeModel->getClassesByNiveau($idNiveau);
            $this->render('Classe/ClasseHome.php', [
                  'Styles' => 'styles/Classes.css',
                  'niveauId' => $niveauId,
                    'annee' => $annee
              ]);
          }
      public function index()
      {
            $classes = $this->classeModel->getAllClasses();
            $this->render('Classe/Classe.php', [
            'title' => 'Classe',
            'classes' => $classes
            ]);
      }
      public function addClasse()
      {
          $libelle = $_POST['libelle'];
          $classe = $this->classeModel->insertClasse($libelle);
          $rowCount = $classe;
  
          if ($rowCount > 0) {
              header('Location: /class');
              exit();
          } else {
              echo "Erreur lors de l'ajout de la classe.";
          }
      }     
      public function deleteClasse($params)
      {
          $id = $params[0];
          $classe = $this->classeModel->deleteClasse($id);
          $rowCount = $classe;
  
          if ($rowCount > 0) {
              header('Location: /class');
              exit();
          } else {
              echo "Erreur lors de la suppression de la classe.";
          }
      }

}