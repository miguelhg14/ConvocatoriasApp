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
        $this->layout = 'rol_layout';
    }
    
    public function index()
    {
        try {
            $objRol = new RolModel();
            $roles = $objRol->obtenerRoles();
            
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

    public function new()
    {
        $this->render('rols/newRol.php');
    }

    public function create()
    {
        try {
            $nombre = $_POST['txtNombre'] ?? null;
            
            if (empty($nombre)) {
                error_log("Error en create: nombre está vacío");
                header('Location:/rol/new');
                return;
            }
    
            $objRol = new RolModel(null, $nombre);
            $resp = $objRol->save();
            
            if ($resp) {
                header('Location:/rol/index');
            } else {
                error_log("Error al guardar el rol: " . print_r($objRol, true));
                header('Location:/rol/new');
            }
        } catch (Exception $e) {
            error_log("Exception en create: " . $e->getMessage());
            header('Location:/rol/new');
        }
        exit();
    }

    public function view($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "id" => $rolInfo[0]->id,
            "nombre" => $rolInfo[0]->nombre,  // Cambiado de tipoRol a nombre
        ];
        $this->render("rols/viewOneRol.php", $data);
    }

    public function editRol($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "infoReal" => $rolInfo[0],
        ];
        $this->render("rols/editRol.php", $data);
    }

    public function updateRol()
    {
        if (isset($_POST["txtId"])) {
            $id = $_POST["txtId"] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $rolObjEdit = new RolModel($id, $nombre);
            $res = $rolObjEdit->editRol();
            if ($res) {
                header('Location:/rol/index');
            } else {
                header('Location:/rol/index');
            }
        }
    }

    public function deleteRol($id)
    {
        if (isset($id)) {
            $rolObjDelete = new RolModel($id);
            $res = $rolObjDelete->deleteRol();
            if ($res) {
                header('Location:/rol/index');
            } else {
                header('Location:/rol/index');
            }
        }
    }
}