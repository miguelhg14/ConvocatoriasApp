<?php

namespace App\Controller;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/userModel.php";

class LoginController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'login_layouts';
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
    public function initLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = trim($_POST['txtCorreo'] ?? '');
            $password = trim($_POST['txtPassword'] ?? '');
            
            if (empty($correo) || empty($password)) {
                $error = "El correo y la contraseña son obligatorios";
                $this->render("login/login.php", ["error" => $error]);
                echo $correo;
                echo $password;
                return;
            }
            
            $userModel = new UserModel();
            if ($userModel->validarLogin($correo, $password)) {
                header("Location: /dashboard");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos";
                $this->render("login/login.php", ["error" => $error]);
                return;
            }
        }
        
        $this->render("login/login.php");
    }

    // public function logout()
    // {
    //     // Destruir todas las sesiones activas
    //     session_destroy();
    //     header("Location:login/init");
    // }


    public function index(){
        $objUser = new UserModel();
        $usuario = $objUser->getAllUsuarios();
        $data=[
            "usuario"=> $usuario,
        ];
        $this->render("usuarios/viewUser.php", $data);
        //require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
    }
    public function new()
    {
        $objUser = new UserModel();
        $usuario = $objUser->getAll();
        //Llamando a la vista
        $data=[
            "usuario"=> $usuario,
        ];
        $this->render("usuarios/newUser.php", $data);
        // $this->render('usuario/newPrograma.php');
    }

    //Guarada los datos del formulario
    // public function create()
    // {
    //     $nombre = $_POST['txtNombre'] ?? null;
    //     $tipoDoc = $_POST['txtTipoDoc'] ?? null;
    //     $documento = $_POST['txtDocumento'] ?? null;
    //     $fechaNac = $_POST['txtFechaNac'] ?? null;
    //     $email = $_POST['txtEmail'] ?? null;
    //     $genero = $_POST['txtGenero'] ?? null;
    //     $estado = $_POST['txtEstado'] ?? null;
    //     $telefono = $_POST['txtTelefono'] ?? null;
    //     $eps = $_POST['txtEps'] ?? null;
    //     $tipoSangre = $_POST['txtTipoSangre'] ?? null;
    //     $peso = $_POST['txtPeso'] ?? null;
    //     $estatura = $_POST['txtEstatura'] ?? null;
    //     $telefonoEmer = $_POST['txtTelefonoEmer'] ?? null;
    //     $password = $_POST['txtPassword'] ?? null;
    //     $observaciones = $_POST['txtObservaciones'] ?? null;
    //     $fkidRol = $_POST['txtFkidRol'] ?? null;
    //     $fkidGrupo = $_POST['txtFkidGrupo'] ?? null;
    //     $fkidCentroForm = $_POST['txtFkidCentroForm'] ?? null;
    //     $fkidTipoUserGym = $_POST['txtFkidTipoUserGym'] ?? null;
    //     if ($nombre) {
    //         $objUser = new UserModel(null, $nombre,$tipoDoc,$documento,$fechaNac,$email,$genero,$estado,$telefono,$eps,$tipoSangre,$peso,$estatura,$telefonoEmer,$password,$observaciones,
    //         $fkidRol,$fkidGrupo,$fkidCentroForm,$fkidTipoUserGym);
    //         $resp = $objUser->save();
    //         if ($resp) {
    //             header('Location:/user/index');
    //         } else {
    //             header('Location:/user/index');
    //         };
    //     }
    // }

//     public function view($id)
//     {

//         $objUser = new UserModel($id);
//         $userInfo = $objUser->getAllUsuario();
//         $data = [
//            "id" => $userInfo[0]->id,
//             "nombre" => $userInfo[0]->nombre,
//             "tipoDoc" => $userInfo[0]->tipoDoc,
//             "documento" => $userInfo[0]->documento,
//             "fechaNac" => $userInfo[0]->fechaNac,
//             "email" => $userInfo[0]->email,
//             "genero" => $userInfo[0]->genero,
//             "estado" => $userInfo[0]->estado,
//             "telefono" => $userInfo[0]->telefono,
//             "eps" => $userInfo[0]->eps,
//             "tipoSangre" => $userInfo[0]->tipoSangre,
//             "peso" => $userInfo[0]->peso,
//             "estatura" => $userInfo[0]->estatura,
//             "telefonoEmer" => $userInfo[0]->telefonoEmer,
//             "password" => $userInfo[0]->password,
//             "observaciones" => $userInfo[0]->observaciones,
//             "fkidRol" => $userInfo[0]->fkidRol,
//             "fkidGrupo" => $userInfo[0]->fkidGrupo,
//             "fkidCentroForm" => $userInfo[0]->fkidCentroForm,
//             "fkidTipoUserGym" => $userInfo[0]->fkidTipoUserGym,
//         ];
//         $this->render("usuario/viewOneUser.php", $data);

//     }
// 
}