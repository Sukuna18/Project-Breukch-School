<?php

namespace App\Controller;

use Core\Controller;
use App\Model\AnneeModel;
use PDOException;

class AnneeController extends Controller
{
    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel = new AnneeModel();
        parent::__construct();
    }
    public function index()
    {
        $annees = $this->anneeModel->getAllAnnees();
        $this->render('AnneeScholaire/Annee.php', [
            'title' => 'Classe',
            'annees' => $annees,
        ]);
    }
    public function addAnnee()
    {
        try {
            $libelle = $_POST['libelle'];
            if (!$this->validator->verifierFormatDate($libelle)) {
                $error = "Date invalide";
                $this->sessionStart($error);
                $this->redirect('/annee');
                exit();
            }
            $this->anneeModel->insertAnnee($libelle);
            $this->redirect('/annee');
        } catch (PDOException $e) {
            $error = "la date doit etre unique";
            $this->sessionStart($error);
            $this->redirect('/annee');
        }
    }
    public function deleteAnnee($params)
    {
        $id = $params[0];
        $this->anneeModel->deleteAnnee($id);
        $this->redirect('/annee');
    }
    public function activeAnnee($params)
    {
        $id = $params[0];
        $this->anneeModel->activeAnnee($id);
        $this->redirect('/annee');

    }
}
