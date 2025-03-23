<?php

namespace App\Controller;

use App\Models\AdministrarUsuariosModelModel;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/administrarUsuariosModel.php";

class AdministrarUsuariosController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'administrarUsuarios_layouts';
        //parent::__construct();
    }
    public function initAdministrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = trim($_POST['txtCorreo'] ?? '');
            $password = trim($_POST['txtPassword'] ?? '');
            
            if (empty($correo) || empty($password)) {
                $error = "El correo y la contraseña son obligatorios";
                $this->render("administrarUsuarios/administrarUsuarios.php", ["error" => $error]);
                echo $correo;
                echo $password;
                return;
            }
            
            $userModel = new UserModel();
            if ($userModel->validarLogin($correo, $password)) {
                header("Location: /administrarUsuario/init");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos";
                $this->render("administrarUsuarios/administrarUsuarios.php", ["error" => $error]);
                return;
            }
        }
        
        $this->render("administrarUsuarios/administrarUsuarios.php");
    }
  
}