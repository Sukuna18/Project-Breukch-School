<?php

namespace App\Controller;

use Core\Controller;
use App\Model\StudentModel;

class StudentController extends Controller
{
    public function index()
    {
     $this->render('StudentList.php', [

        'Styles' => 'styles/StudentList.css'
    ]);

    }
    public function login()
    {
        $this->render('Login.php', [
            'title' => 'Login',
        ]);
    }
    public function edit()
    {
        $this->render('Edit.php', [
            'Styles' => 'styles/Edit.css'
        ]);
    }
    public function add()
    {
        $this->render('Add.php', [
            'Styles' => 'styles/Add.css'
        ]);
    }
    public function Annee(){
        $this->render('Annee.php', [
            'title' => 'Annee',
        ]);
    }
    public function addAnnee(){
        $this->render('AddAnnee.php', [
            'Styles' => 'styles/Add.css'
        ]);
    }
    public function addClass(){
        $this->render('AddClass.php', [
            'Styles' => 'styles/Add.css'
        ]);
    }
    public function classe(){
        $this->render('Classe.php', [
            'title' => 'Classe',
        ]);
    }
    public function addStudent(){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $birthday = $_POST['birthday'];
        $studentDB = new StudentModel();
        $studentDB->addStudent($prenom, $nom, $numero,$birthday);
        if ($studentDB) {
            header('Location: /list');
        }
        else {
            echo "Error";
        }
    }
}
