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
        parent::__construct();
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
        try {
            $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $birthday = $_POST['birthday'];
        $naissance = $_POST['lieu'];
        $sexe = $_POST['sexe'];
        if(!$this->validator->verifierDateNaissance($birthday)){
            $error = "Date de naissance invalide";
            $this->sessionStart($error);
            $this->redirect('/add');
            exit();
        }
        $student = $this->studentModel->insertStudent($prenom, $nom, $numero, $birthday, $naissance, $sexe);
        $rowCount = $student;

        if ($rowCount > 0) {
            $this->redirect('/add');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'étudiant.";
        }
        } catch (\PDOException $e) {
            $error = "le numero doit etre unique";
            $this->sessionStart($error);
            $this->redirect('/add');
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
        $this->redirect('/list');

    }
    
    public function deleteStudent($params)
    {
        $id = $params[0];
        $this->studentModel->deleteStudent($id);
        $this->redirect('/list');
    }
    public function getAllClasses(){
        $classes = $this->studentModel->getAllClasses();
        echo json_encode($classes);
       
    }
    public function getAllNiveaux(){
        $niveaux = $this->studentModel->getAllNiveaux();
        echo json_encode($niveaux);
    }

    // public function addStudentClasses($params){
    //     $id_student = $params[0];
    //     $students = $this->studentModel->getStudentsId($id_student);
    //     $id_classe = $_POST['classe'];
    //     $this->studentModel->insertStudentClasse($id_student, $id_classe);
    //     $this->render('Students/Add.php', [
    //         'student' => $students
    //     ]);
    //     $this->redirect('/add');
    // }
}
