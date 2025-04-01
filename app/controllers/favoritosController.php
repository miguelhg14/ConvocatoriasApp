<?php

namespace App\Controller;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/favoritosModel.php";

class FavoritosController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'favoritos_layout';
        //parent::__construct();
    }
    
    public function initFavoritos()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = trim($_POST['txtCorreo'] ?? '');
            $password = trim($_POST['txtPassword'] ?? '');
            
            if (empty($correo) || empty($password)) {
                $error = "El correo y la contraseña son obligatorios";
                $this->render("favoritos/favoritos.php", ["error" => $error]);
                echo $correo;
                echo $password;
                return;
            }
            
            $userModel = new FavoritosModel();
            if ($userModel->validarLogin($correo, $password)) {
                header("Location: /favoritos/init");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos";
                $this->render("favoritos/favoritos.php", ["error" => $error]);
                https://github.com/Bran666/ConvocatoriasApp
                return;
            }
        }
        
        $this->render("favoritos/favoritos.php");
    }
}