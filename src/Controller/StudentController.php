<?php

namespace App\Controller;
use Core\Controller;
use App\Model\StudentModel;

class StudentController extends Controller
{
    private $studentModel;
    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }
    public function index()
    {
        $students = $this->studentModel->getAllStudents();
        $this->render('Students/StudentList.php', [
            'Styles' => 'styles/StudentList.css',
            'students' => $students
        ]);
    }
    public function login()
    {
        $this->render('Students/Login.php', [
            'title' => 'Login',
        ]);
    }
    public function edit($params)
    {
        $id = $params[0];
        $student = $this->studentModel->getStudentsId($id);
        $this->render('Students/Edit.php', [
            'Styles' => 'styles/Edit.css',
            'student' => $student

        ]);
    }
    public function add()
    {
        $this->render('Students/Add.php', [
            'Styles' => 'styles/Add.css',
        ]);
    }
    public function addStudent()
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $birthday = $_POST['birthday'];
        $naissance = $_POST['lieu'];
        $sexe = $_POST['sexe'];
        $student = $this->studentModel->insertStudent($prenom, $nom, $numero, $birthday, $naissance, $sexe);
        $rowCount = $student;

        if ($rowCount > 0) {
            header('Location: /add');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'étudiant.";
        }
    }
    public function updateStudent($params){
        $id = $params[0];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $birthday = $_POST['birthday'];
        $naissance = $_POST['lieu'];
        $sexe = $_POST['sexe'];
        $this->studentModel->updateStudent($id, $prenom, $nom, $birthday, $naissance, $sexe);
        header('Location: /list');

    }
    
    public function deleteStudent($params)
    {
        $id = $params[0];
        $this->studentModel->deleteStudent($id);
        header('Location: /list');
       
    }

}
