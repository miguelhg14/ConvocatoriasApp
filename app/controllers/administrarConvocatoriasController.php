<?php

namespace App\Controller;

use App\Models\AdministrarConvocatoriasModel;
use App\Models\AdministrarUsuariosModelModel;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/administrarConvocatoriasModel.php";

class AdministrarConvocatoriasController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'administrarConvocatorias_layouts';
        //parent::__construct();
    }
    public function initAdministrarConvocatorias()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = trim($_POST['txtCorreo'] ?? '');
            $password = trim($_POST['txtPassword'] ?? '');
            
            if (empty($correo) || empty($password)) {
                $error = "El correo y la contraseña son obligatorios";
                $this->render("administrarConvocatorias/administrarConvocatorias.php", ["error" => $error]);
                echo $correo;
                echo $password;
                return;
            }
            
            $userModel = new AdministrarConvocatoriasModel();
            if ($userModel->validarLogin($correo, $password)) {
                header("Location: /administrarConvocatorias/init");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos";
                $this->render("administrarConvocatorias/administrarConvocatorias.php", ["error" => $error]);
                return;
            }
        }
        
        $this->render("administrarConvocatorias/administrarConvocatorias.php");
    }
  
}