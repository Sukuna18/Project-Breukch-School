<?php

namespace App\Controller;

use Core\Controller;

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
            'Styles' => 'styles/login.css'
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
}
