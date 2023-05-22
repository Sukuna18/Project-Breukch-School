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
    }
    public function index()
    {
        $annees = $this->anneeModel->getAllAnnees();
        $this->render('AnneeScholaire/Annee.php', [
            'title' => 'Classe',
            'annees' => $annees
        ]);
    }
    public function addAnnee()
    {
        try {
            $libelle = $_POST['libelle'];
            if (!$this->verifierFormatDate($libelle)) {
                session_start();
                $_SESSION['erreur'] = "Date invalide";

                header('Location: /annee');
                exit();
                
               
            }
            $this->anneeModel->insertAnnee($libelle);
            header('Location: /annee');
        } catch (PDOException $e) {
            session_start();
            $_SESSION['erreur1'] = "Date doit etre unique";
            header('Location: /annee');
        }
    }
    public function deleteAnnee($params)
    {
        $id = $params[0];
        $this->anneeModel->deleteAnnee($id);
        header('Location: /annee');
    }
    public function verifierFormatDate($annee)
    {
        if (strlen($annee) !== 9 || strpos($annee, '-') !== 4) {
            return false;
        }
        $parties = explode('-', $annee);
        if (count($parties) !== 2) {
            return false;
        }
        $debut_annee = trim($parties[0]);
        $fin_annee = trim($parties[1]);
        if (!is_numeric($debut_annee) || !is_numeric($fin_annee)) {
            return false;
        }
        return ($fin_annee - $debut_annee === 1);
    }
    public function activeAnnee($params)
    {
        $id = $params[0];
        $this->anneeModel->activeAnnee($id);
        header('Location: /annee');
    }
}
