<?php

namespace App\Controller;

use App\Models\RequisitoSeleccionModel;
use Exception;
use App\Models\TipoModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/requisitoSeleccionModel.php";
require_once MAIN_APP_ROUTE . "../models/tipoModel.php";

class RequisitoSeleccionController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'requisito_seleccion_layout';
    }

    public function initRequisitoSeleccion()
    {
        try {
            $objRequisitoSeleccion = new RequisitoSeleccionModel();
            $requisitos = $objRequisitoSeleccion->getAllWithTipoName();
            
            // Eliminamos el var_dump de aquí
            
            $data = [
                'title' => 'Lista de Requisitos de Selección',
                "requisitos" => $requisitos,
            ];
            $this->render("requisitoSeleccion/viewRequisitoSeleccion.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in RequisitoSeleccionController->initRequisitoSeleccion: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Requisitos de Selección',
                "requisitos" => [],
                "error" => "Error al cargar los requisitos"
            ];
            $this->render("requisitoSeleccion/viewRequisitoSeleccion.php", $data);
        }
    }


    public function new()
    {
        // Obtener los tipos disponibles para el select
        $tipoModel = new TipoModel();
        $tipo = $tipoModel->getAll();
        
        $data = [
            'tipos' => $tipo // Mantenemos 'tipos' como clave del array para no tener que modificar la vista
        ];
        $this->render('requisitoSeleccion/newRequisitoSeleccion.php', $data);
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $idTipo = $_POST['idTipo'] ?? null;
        
        error_log("Datos recibidos en create() - Nombre: $nombre, idTipo: $idTipo");
        
        if ($nombre && $idTipo) {
            try {
                $objRequisitoSeleccion = new RequisitoSeleccionModel(null, $nombre, (int)$idTipo);
                $resp = $objRequisitoSeleccion->save();
                
                if ($resp) {
                    error_log("Inserción exitosa");
                    header('Location: /requisitoSeleccion/init');
                    exit;
                } else {
                    error_log("Error: La inserción no fue exitosa");
                    header('Location: /requisitoSeleccion/init?error=2');
                    exit;
                }
            } catch (Exception $e) {
                error_log("Error en create(): " . $e->getMessage());
                header('Location: /requisitoSeleccion/init?error=3');
                exit;
            }
        }
        
        error_log("Datos incompletos");
        header('Location: /requisitoSeleccion/init?error=1');
        exit;
    }

    public function view($id)
    {
        try {
            $objRequisitoSeleccion = new RequisitoSeleccionModel($id);
            $requisitoInfo = $objRequisitoSeleccion->getRequisitoSeleccion();
            
            // Debug log to see what we're getting
            error_log("RequisitoInfo: " . print_r($requisitoInfo, true));
            
            if ($requisitoInfo && is_array($requisitoInfo) && count($requisitoInfo) > 0) {
                $data = [
                    'title' => 'Ver Requisito de Selección',
                    'requisito' => $requisitoInfo[0]  // Pass the raw data
                ];
                $this->render("requisitoSeleccion/viewOneRequisitoSeleccion.php", $data);
            } else {
                error_log("No se encontró el requisito con ID: " . $id);
                header('Location: /requisitoSeleccion/init?error=not_found');
                exit;
            }
        } catch (Exception $e) {
            error_log("Error al ver requisito: " . $e->getMessage());
            header('Location: /requisitoSeleccion/init?error=error_view');
            exit;
        }
    }

    public function editRequisitoSeleccion($id)
    {
        $objRequisitoSeleccion = new RequisitoSeleccionModel($id);
        $requisitoInfo = $objRequisitoSeleccion->getRequisitoSeleccion();
        $data = [
            "infoReal" => !empty($requisitoInfo) ? $requisitoInfo[0] : null,
        ];
        $this->render("requisitoSeleccion/editRequisitoSeleccion.php", $data);
    }

    public function updateRequisitoSeleccion()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idTipo = $_POST["idTipo"] ?? null;
            
            $requisitoObjEdit = new RequisitoSeleccionModel($id, $nombre, $idTipo);
            $res = $requisitoObjEdit->editRequisitoSeleccion();
            if ($res) {
                header('Location:/requisitoSeleccion/init');
            } else {
                header('Location:/requisitoSeleccion/init');
            }
        }
    }

    public function deleteRequisitoSeleccion($id)
    {
        if (isset($id)) {
            $requisitoObjDelete = new RequisitoSeleccionModel($id);
            $res = $requisitoObjDelete->deleteRequisitoSeleccion();
            if ($res) {
                header('Location:/requisitoSeleccion/init');
            } else {
                header('Location:/requisitoSeleccion/init');
            }
        }
    }
}