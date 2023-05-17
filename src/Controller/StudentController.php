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
}
