<?php

namespace App\Controller;

use App\Models\PublicoObjetivoModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/publicoObjetivoModel.php";

class PublicoObjetivoController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'publicoObjetivo_layout';
    }

    public function initPublicoObjetivo()
    {
        try {
            $objPublicoObjetivo = new PublicoObjetivoModel();
            $publicosObjetivo = $objPublicoObjetivo->getAll();
            
            $data = [
                'title' => 'Lista de Público Objetivo',
                "publicosObjetivo" => $publicosObjetivo,
            ];
            $this->render("publicoObjetivo/viewPublicoObjetivo.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoController->initPublicoObjetivo: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Público Objetivo',
                "publicosObjetivo" => [],
                "error" => "Error al cargar el público objetivo"
            ];
        }
    }

    public function new()
    {
        $this->render('publicoObjetivo/newPublicoObjetivo.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        if ($nombre) {
            $objPublicoObjetivo = new PublicoObjetivoModel(null, $nombre);
            $resp = $objPublicoObjetivo->save();
            if ($resp) {
                header('Location:/publicoObjetivo/init');
            } else {
                header('Location:/publicoObjetivo/init');
            };
        }
    }

    public function view($id)
    {
        $objPublicoObjetivo = new PublicoObjetivoModel($id);
        $publicoObjetivoInfo = $objPublicoObjetivo->getPublicoObjetivo();
        $data = [
            "id" => $publicoObjetivoInfo[0]->id,
            "nombre" => $publicoObjetivoInfo[0]->nombre,
        ];
        $this->render("publicoObjetivo/viewOnePublicoObjetivo.php", $data);
    }

    public function editPublicoObjetivo($id)
    {
        $objPublicoObjetivo = new PublicoObjetivoModel($id);
        $publicoObjetivoInfo = $objPublicoObjetivo->getPublicoObjetivo();
        $data = [
            "infoReal" => $publicoObjetivoInfo[0],
        ];
        $this->render("publicoObjetivo/editPublicoObjetivo.php", $data);
    }

    public function updatePublicoObjetivo()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $publicoObjetivoObjEdit = new PublicoObjetivoModel($id, $nombre);
            $res = $publicoObjetivoObjEdit->editPublicoObjetivo();
            if ($res) {
                header('Location:/publicoObjetivo/init');
            } else {
                header('Location:/publicoObjetivo/init');
            }
        }
    }

    public function deletePublicoObjetivo($id)
    {
        if (isset($id)) {
            $publicoObjetivoObjDelete = new PublicoObjetivoModel($id);
            $res = $publicoObjetivoObjDelete->deletePublicoObjetivo();
            if ($res) {
                header('Location:/publicoObjetivo/init');
            } else {
                header('Location:/publicoObjetivo/init');
            }
        }
    }
}