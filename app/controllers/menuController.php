<?php

namespace App\Controller;

use App\Models\MenuModel;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/menuModel.php";

class MenuController extends BaseController
{
    public function __construct()
    {
        // Se define Layout para el controlador específico
        $this->layout = 'admin_layout';
    }

    public function initMenu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['txtEmail'], $_POST['txtPassword'])) {
            // El usuario envió email y contraseña
            $email = trim($_POST['txtEmail']);
            $password = trim($_POST['txtPassword']);
            
            if (!empty($email) && !empty($password)) {
                $userModel = new MenuModel();
                
                if ($userModel->validarLogin($email, $password)) {
                    // Login exitoso, redirigir al perfil
                    header("Location: /menu/init");
                    exit();
                } else {
                    $error = "El usuario y/o contraseña incorrectos";
                }
            } else {
                $error = "El usuario y/o contraseña no pueden estar vacíos";
            }
            
            // Si hay error, renderizar vista con mensaje
            $data = ["error" => $error];
            $this->render("/admin/admin.php", $data);
        } else {
            // Renderizar formulario
            $this->render("/admin/admin.php");
        }
    }
}