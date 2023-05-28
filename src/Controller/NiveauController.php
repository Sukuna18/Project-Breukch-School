<?php

namespace App\Controller;
use Core\Controller;
use App\Model\NiveauModel;
class NiveauController extends Controller
{
    private $NiveauModel;
  public function __construct()
    {
        $this->NiveauModel = new NiveauModel();
    }
    public function index()
    {
      $niveau = $this->NiveauModel->getAllNiveaux();
        $this->render('Niveau/Niveau.html.php', [
            'Styles' => 'styles/Niveau.css',
            'niveau' => $niveau
        ]);
    }
  
}