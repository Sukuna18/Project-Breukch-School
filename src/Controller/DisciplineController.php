<?php


namespace App\Controller;

use App\Model\DisciplineModel;
use Core\Controller;

class DisciplineController extends Controller
{
  public $model;
  public function __construct()
  {
    $this->model = new DisciplineModel();
  }
  public function index()
  {
    $discipline = $this->model->getAllDiscipline();
    $this->render('Discipline/Discipline.html.php', [
      'discipline' => $discipline
    ]);
  }

  public function getAllGroupeDiscipline()
  {
    $result = $this->model->getAllGroupeDiscipline();
    $this->json($result);
  }
  public function getAllDiscipline()
  {
    $result = $this->model->getAllDiscipline();
    $this->json($result);
  }
  public function addDiscipline()
  {
    $this->model->addDiscipline($_POST['discipline']);
    $lastId = $this->model->getLastInsertId();
    $this->model->addClasseDiscipline($_POST['classe']);
    $this->json(['success' => 'ajout reussie', 'id' => $lastId]);
  }
  public function deleteDiscipline()
  {
    try {
      $data = file_get_contents('php://input');
      foreach (json_decode($data) as $item) {
        $this->model->deleteDiscipline($item);
      }
      $this->json(['success' => 'suppression reussie']);
    } catch (\Throwable $th) {
      $this->json(['error' => $th->getMessage()]);
    }
  }
  public function addGroupeDiscipline()
  {
   try {
    $data = file_get_contents('php://input');
    $this->model->addGroupeDiscipline(json_decode($data)->libelle);
    $this->json(['success' => 'ajout reussie']);
   } catch (\Throwable $th) {
    $this->json(['error' => $th->getMessage()]);
   }
  
  }
}
