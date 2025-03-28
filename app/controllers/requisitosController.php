<?php

namespace App\Controller;

use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/requisitosModel.php";

class requisitosController extends BaseController
{
    public function __construct()
    {
        // Se define Layout para el controlador específico
        $this->layout = 'requisitos_layout';
    }

    public function initRequisitos()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['txtEmail'], $_POST['txtPassword'])) {
            // El usuario envió email y contraseña
            $email = trim($_POST['txtEmail']);
            $password = trim($_POST['txtPassword']);
            
            if (!empty($email) && !empty($password)) {
                $userModel = new UserModel();
                
                if ($userModel->validarLogin($email, $password)) {
                    // Login exitoso, redirigir al perfil
                    header("Location: /requisitos/init");
                    exit();
                } else {
                    $error = "El usuario y/o contraseña incorrectos";
                }
            } else {
                $error = "El usuario y/o contraseña no pueden estar vacíos";
            }
            
            // Si hay error, renderizar vista con mensaje
            $data = ["error" => $error];
            $this->render("/requisitos/requisitos.php", $data);
        } else {
            // Renderizar formulario
            $this->render("/requisitos/requisitos.php");
        }
    }
    
}
