<?php

namespace App\Controller;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/convocatoriaModel.php";

class ConvocatoriaController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'convocatorias_layout';
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
    public function initConvocatoria()
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
                $this->render("/convocatoria/convocatorias.php", $data);
            } else {
                $usrObj = new ConvocatoriaModel(null, $email, $password );
                if ($usrObj->validarLogin($email, $password)) {
                    header("Location:/convocatoria/init");
                } else {
                    $error = "El usuario y/o contraseña no pueden ser vacios";
                    $data = [
                        "error" => $error
                    ];
                    $this->render("/convocatoria/convocatorias.php", $data);
                }
            }
        } else {
            //Sino se renderisa el formulario
            $this->render('convocatorias/convocatorias.php');
        }
    }
}