<?php

namespace App\Controller;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/userPerfilModel.php";

class UserPerfilController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'userPerfil_loyout';
        //parent::__construct();
    }
    // public function index(){
    //     if (!isset($_SESSION['tipo_usuario'])) {
    //         header("Location:/login/init");
    //     } else {
    //         if (!in_array($_SESSION['tipo_usuario'], ['paciente','admin'])) {
    //             header("Location:/login/init");
    //         }
    //     }

    //     $usuario = new UserModel();
    //     $usuarios = $usuario->getAll();
    //     $data[
    //         "usuarios"  => $usuarios,
    //     ];
    //     $this->render("/login/index");
    // }
    public function initUserPerfil()
    {
        if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
            //El usuario envio email y contraseña
            $email = trim($_POST['txtEmail']) ?? null;
            $password = trim($_POST['txtPassword']) ?? null;
            $error = '';
            if ($email != '' && $password != '') {
                $error = "El usuario y/o contraseña incorrectos";
                $data = [
                    "error" => $error
                ];
                $this->render("/userPerfil/userPerfil.php", $data);
            } else {
                $usrObj = new UserPerfilModel(null, $email, $password );
                if ($usrObj->validarLogin($email, $password)) {
                    header("Location:/userPerfil/init");
                } else {
                    $error = "El usuario y/o contraseña no pueden ser vacios";
                    $data = [
                        "error" => $error
                    ];
                    $this->render("/userPerfil/userPerfil.php", $data);
                }
            }
        } else {
            //Sino se renderisa el formulario
            $this->render('userPerfil/userPerfil.php');
        }
    }
}