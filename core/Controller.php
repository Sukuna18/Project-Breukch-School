<?php

namespace Core;
use Core\Validator;

class Controller
{
    public $validator;
    public function __construct()
    {
        $this->validator = new Validator();
        
    }

    public function json(array $data)
    {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function render(string $view, array $params = null)
    {
        ob_start();
        require_once __DIR__ . '/../views/' . $view;
        isset($params) ?? $params = extract($params);
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layout.php';
    }
    public function redirect(string $path)
    {
        header('Location: ' . $path);
    }
    public function sessionStart($error)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['erreur'] = $error;
    }
}
