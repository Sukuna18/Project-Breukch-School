<?php

namespace App\Controller;

use Core\Controller;
use App\Model\StudentModel;

class StudentController extends Controller
{
    public function index()
    {
        $studentModel = new StudentModel();
        $students = $studentModel->getAllStudents();
     $this->render('StudentList.php', [

        'Styles' => 'styles/StudentList.css',
        'students' => $students
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
            'Styles' => 'styles/Add.css',
        ]);
    }
    public function Annee(){
        $this->render('Annee.php', [
            'title' => 'Annee',
        ]);
    }
    public function classe(){
        $this->render('Classe.php', [
            'title' => 'Classe',
        ]);
    }
    public function addStudent()
    {
        // Récupérer les données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $birthday = $_POST['birthday'];
        $studentModel = new StudentModel();
        $rowCount = $studentModel->insertStudent($prenom, $nom, $numero, $birthday);

        if ($rowCount > 0) {
            header('Location: /list');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'étudiant.";
        }
    }
    public function editStudent($id)
    {
        if (isset($_POST['prenom'], $_POST['nom'], $_POST['numero'], $_POST['birthday'])) {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $numero = $_POST['numero'];
            $birthday = $_POST['birthday'];
    
            $studentModel = new StudentModel();
            $rowCount = $studentModel->updateStudent($id, $prenom, $nom, $numero, $birthday);
    
            if ($rowCount > 0) {
                header('Location: /list');
                exit();
            } else {
                echo "Erreur lors de la modification de l'étudiant.";
            }
        } else {
            $this->render('errroDB.php', [
                'title' => 'erreur',
            ]);
        }
    }
    
    
    public function deleteStudent($id)
    {
        $studentModel = new StudentModel();
        $rowCount = $studentModel->deleteStudent($id);
        if ($rowCount > 0) {
            header('Location: /list');
            exit();
        } else {
            echo "Erreur lors de la suppression de l'étudiant.";
        }
    }

}
