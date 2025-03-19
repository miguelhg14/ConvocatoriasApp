<?php

namespace App\Controller;

use App\Models\RolModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/rolModel.php";

class RolController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'dashboard_layout';
    }
    public function index()
    {
        try {
            $objRol = new RolModel();
            $roles = $objRol->getAll();
            
            $data = [
                'title' => 'Lista roles',
                "roles" => $roles,
            ];
            $this->render("rols/viewRol.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in RolController->index: " . $e->getMessage());
            $data = [
                'title' => 'Lista roles',
                "roles" => [],
                "error" => "Error al cargar los roles"
            ];
            $this->render("rols/viewRol.php", $data);
        }
    }

    //Muestra un formulario para el new rol
    public function new()
    {
        $this->render('rols/newRol.php');
    }

    //Guarada los datos del formulario
    public function create()
    {
        $nombre = $_POST['txtNombre'] ?? null;
        if ($nombre) {
            $objRol = new RolModel(null, $nombre);
            $resp = $objRol->save();
            if ($resp) {
                header('Location:/rol/index');
            } else {
                header('Location:/rol/index');
            };
        }
    }

    public function view($id)
    {

        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "id" => $rolInfo[0]->id,
            "nombre" => $rolInfo[0]->tipoRol,
        ];
        $this->render("rols/viewOneRol.php", $data);

        // Crear el objeto rol
        // Traer la informacion de ese rol desde la base de datos
    }

    // Mostrar lo que se quiere editar 
    public function editRol($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "infoReal" => $rolInfo[0],
        ];
        $this->render("rols/editRol.php", $data);
    }

    // Se edita como tal en la BD
    public function updateRol()
    {
        if (isset($_POST["txtId"])) {
            $id = $_POST["txtId"] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $rolObjEdit = new RolModel($id, $nombre);
            $res = $rolObjEdit->editRol();
            if ($res) {
                header('Location:/rol/index');
            }else {
                header('Location:/rol/index');
            }
        }
    }

    public function deleteRol($id)
    {
        echo $id;
        if (isset($id)) {
            $rolObjDelete = new RolModel($id);
            $res = $rolObjDelete->deleteRol();
            print_r($res);
            if ($res) {
                header('Location:/rol/index');
            }else {
                header('Location:/rol/index');
            }
        }
    }
}
