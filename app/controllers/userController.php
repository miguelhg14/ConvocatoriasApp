<?php

namespace App\Controller;

use App\models\RolModel;
use App\models\GrupoModel;
use App\models\CentroModel;
use App\models\TipoUsuarioModel;
use App\models\UsuarioModel;
use DateTime;
use Exception;

require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/rolModel.php";
require_once MAIN_APP_ROUTE . "../models/grupoModel.php";
require_once MAIN_APP_ROUTE . "../models/centroModel.php";
require_once MAIN_APP_ROUTE . "../models/tipoUsuarioModel.php";
require_once MAIN_APP_ROUTE . "../models/usuarioModel.php";

class UsuarioController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
    }

    public function index()
    {

        $objUsuario = new UsuarioModel();
        $usuario = $objUsuario->getAll();
        $data = [
            "usuario" => $usuario
        ];
        $this->render("usuario/viewUsuario.php", $data);
    }

    public function viewAll(){ 
        $objUsuario = new UsuarioModel();
        $usuario = $objUsuario->getAllUsuario();
        $data = [
            "usuario" => $usuario
        ];
        $this->render("usuario/viewUsuario.php", $data);
    }


    public function new()
    {
        // $objRol = new RolModel();
        // $rol = $objRol->getAll();

        // $objGrupo = new GrupoModel();
        // $grupo = $objGrupo->getAll();

        // $objCentro = new CentroModel();
        // $centros = $objCentro->getAll();

        // $objTipoUsuario = new TipoUsuarioModel();
        // $usuario = $objTipoUsuario->getAll();

        // $data = [
        //     "rol" => $rol,
        //     "grupo" => $grupo,
        //     "centros" => $centros,
        //     "usuario" => $usuario
        // ];
        $this->render("usuarios/newUser.php", $data);
    }

    public function create()
{
    $nombre = $_POST["txtNombre"] ?? null;
    $tipoDoc = $_POST["txtTipoDoc"] ?? null;
    $documento = $_POST["txtDocumento"] ?? null;
    $fechaNac = $_POST["txtFechaNac"] ?? null;
    $email = $_POST["txtEmail"] ?? null;
    $genero = $_POST["txtGenero"] ?? null;
    $estado = $_POST["txtEstado"] ?? null;
    $telefono = $_POST["txtTelefono"] ?? null;
    $eps = $_POST["txtEps"] ?? null;
    $tipoSangre = $_POST["txtTipoSangre"] ?? null;
    $peso = $_POST["txtPeso"] ?? null;
    $estatura = $_POST["txtEstatura"] ?? null;
    $telefonoEmer = $_POST["txtTelefonoEmer"] ?? null;
    $password = $_POST["txtPassword"] ?? null;
    $observaciones = $_POST["txtObservaciones"] ?? null;
    $rol = $_POST["txtRol"] ?? null;
    $grupo = $_POST["txtGrupo"] ?? null;
    $centro = $_POST["txtCentro"] ?? null;
    $tipoUsuario = $_POST["txtTipoUsuario"] ?? null;


    if ($nombre && $tipoDoc && $documento && $fechaNac && $email && $genero && $estado && $telefono && $eps && $tipoSangre && $peso && $estatura && $telefonoEmer && $password && $observaciones && $rol && $grupo && $centro && $tipoUsuario) {
       // Convierte las fechas de string a DateTime
        $fechaNac = new DateTime($fechaNac);
        

        // Crea la instancia de UsuarioModel con las fechas convertidas
        $objUsuario = new UsuarioModel(null,$nombre, $tipoDoc, $documento, $fechaNac, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmer, $password, $observaciones, $rol, $grupo, $centro, $tipoUsuario);
        
        $res = $objUsuario->save();
        if ($res) {
            header("Location: /usuario/index");
        } else {
            header("Location: /usuario/index");
        }
    }
}

    public function deleteUsuario($id)
    {
        $objUsuario = new UsuarioModel($id);
        $res = $objUsuario->deleteUsuario();

        if ($res) {
            header("Location: /usuario/index");
        } else {
            echo "Error al eliminar la usuario";
        }
    }

    public function editUsuario($id)
    {
        $objUsuario = new UsuarioModel($id);
        $usuarioInfo = $objUsuario->getOneUsuario() ?? $objUsuario->getOneRol() ?? $objUsuario->getOneGrupo() ?? $objUsuario->getOneCentro() ?? $objUsuario->getOneTipoUser();

        $objRol = new RolModel();
        $rol = $objRol->getAll();

        $objGrupo = new GrupoModel();
        $grupo = $objGrupo->getAll();

        $objCentro = new CentroModel();
        $centros = $objCentro->getAll();

        $objTipoUsuario = new TipoUsuarioModel();
        $tipoUsuario = $objTipoUsuario->getAll();


        $data = [
            "usuario" => $usuarioInfo[0],
            "rol" => $rol,
            "grupo" => $grupo,
            "centros" => $centros,
            "tipoUsuario" => $tipoUsuario

        ];
        $this->render("usuario/editUsuario.php", $data);
    }


    public function updateUsuario()
{
    if (isset($_POST["txtId"])) {
        $id = $_POST["txtId"] ?? null;
        $nombre = $_POST["txtNombre"] ?? null;
        $tipoDoc = $_POST["txtTipoDoc"] ?? null;
        $documento = $_POST["txtDocumento"] ?? null;
        $fechaNac = $_POST["txtFechaNac"] ?? null;
        $email = $_POST["txtEmail"] ?? null;
        $genero = $_POST["txtGenero"] ?? null;
        $estado = $_POST["txtEstado"] ?? null;
        $telefono = $_POST["txtTelefono"] ?? null;
        $eps = $_POST["txtEps"] ?? null;
        $tipoSangre = $_POST["txtTipoSangre"] ?? null;
        $peso = $_POST["txtPeso"] ?? null;
        $estatura = $_POST["txtEstatura"] ?? null;
        $telefonoEmer = $_POST["txtTelefonoEmer"] ?? null;
        $password = $_POST["txtPassword"] ?? null;
        $observaciones = $_POST["txtObservaciones"] ?? null;
        $rol = $_POST["txtRol"] ?? null;
        $grupo = $_POST["txtGrupo"] ?? null;
        $centro = $_POST["txtCentro"] ?? null;
        $tipoUsuario = $_POST["txtTipoUsuario"] ?? null;

        if ($id && $nombre && $tipoDoc && $documento && $fechaNac && $email && $genero && $estado && $telefono && $eps && $tipoSangre && $peso && $estatura && $telefonoEmer && $password && $observaciones && $rol && $grupo && $centro && $tipoUsuario) {
            try {
                // Convierte las fechas de string a DateTime
                $fechaNac = new DateTime($fechaNac);
                

                // Crea la instancia de UsuarioModel con las fechas convertidas
                $objUsuarioEdit = new UsuarioModel($id, $nombre, $tipoDoc, $documento, $fechaNac, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmer, $password, $observaciones, $rol, $grupo, $centro, $tipoUsuario);
                $res = $objUsuarioEdit->editUsuario();
                if ($res) {
                    header("Location: /usuario/index");
                } else {
                    echo "Error al editar la usuario";
                }
            } catch (Exception $e) {
                echo "Error en el formato de las fechas: " . $e->getMessage();
            }
        }
    }
}
    

    public function viewOneUsuario($id)
    {
        $ObjOneUsuario = new UsuarioModel( $id);
        $usuario = $ObjOneUsuario->getOneUsuario();

        $ObjOneRol = new RolModel($id);
        $rol = $ObjOneRol->getRol();

        $ObjOneGrupo = new GrupoModel($id);
        $grupo = $ObjOneGrupo->getOneGrupo();

        $ObjOneCentro = new CentroModel($id);
        $centro = $ObjOneCentro->getCentro();

        $ObjOneTipoUsuario = new TipoUsuarioModel($id);
        $tipoUsuario = $ObjOneTipoUsuario->getOneUsuario();

        $data = [
            "id" => $usuario[0]->id,
            "nombre" => $usuario[0]->nombre,
            "tipoDoc" => $usuario[0]->tipoDoc,
            "documento" => $usuario[0]->documento,
            "fechaNac" => $usuario[0]->fechaNac,
            "email" => $usuario[0]->email,
            "genero" => $usuario[0]->genero,
            "estado" => $usuario[0]->estado,
            "telefono" => $usuario[0]->telefono,
            "eps" => $usuario[0]->eps,
            "tipoSangre" => $usuario[0]->tipoSangre,
            "peso" => $usuario[0]->peso,
            "estatura" => $usuario[0]->estatura,
            "telefonoEmer" => $usuario[0]->telefonoEmer,
            "password" => $usuario[0]->password,
            "observaciones" => $usuario[0]->observaciones,
            "rol" => $rol[0]->nombre,
            "grupo" => $grupo[0]->id,
            "centro" => $centro[0]->nombre,
            "tipoUsuario" => $tipoUsuario[0]->nombre
            
        ];
        $this->render("usuario/viewOneUsuario.php", $data);
    }
}