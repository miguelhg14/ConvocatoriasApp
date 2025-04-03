<?php

namespace App\Controller;

use App\Models\TipoModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/tipoModel.php";

class TipoController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'tipo_layout';
    }

    public function initTipo()
    {
        try {
            $objTipo = new TipoModel();
            $tipos = $objTipo->getAll();
            
            $data = [
                'title' => 'Lista de Tipos',
                "tipos" => $tipos,
            ];
            $this->render("tipo/viewTipo.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in TipoController->initTipo: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Tipos',
                "tipos" => [],
                "error" => "Error al cargar los tipos"
            ];
        }
    }

    public function new()
    {
        $this->render('tipo/newTipo.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        if ($nombre) {
            $objTipo = new TipoModel(null, $nombre);
            $resp = $objTipo->save();
            if ($resp) {
                header('Location:/tipo/init');
            } else {
                header('Location:/tipo/init');
            }
        }
    }

    public function view($id)
    {
        $objTipo = new TipoModel($id);
        $tipoInfo = $objTipo->getTipo();
        $data = [
            "id" => $tipoInfo[0]->id,
            "nombre" => $tipoInfo[0]->nombre,
        ];
        $this->render("tipo/viewOneTipo.php", $data);
    }

    public function editTipo($id)
    {
        $objTipo = new TipoModel($id);
        $tipoInfo = $objTipo->getTipo();
        $data = [
            "infoReal" => $tipoInfo[0],
        ];
        $this->render("tipo/editTipo.php", $data);
    }

    public function updateTipo()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $tipoObjEdit = new TipoModel($id, $nombre);
            $res = $tipoObjEdit->editTipo();
            if ($res) {
                header('Location:/tipo/init');
            } else {
                header('Location:/tipo/init');
            }
        }
    }

    public function deleteTipo($id)
    {
        if (isset($id)) {
            $tipoObjDelete = new TipoModel($id);
            $res = $tipoObjDelete->deleteTipo();
            if ($res) {
                header('Location:/tipo/init');
            } else {
                header('Location:/tipo/init');
            }
        }
    }
}