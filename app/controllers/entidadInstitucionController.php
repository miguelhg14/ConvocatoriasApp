<?php

namespace App\Controller;

use App\Models\EntidadInstitucionModel;
use App\Models\LineaModel;
use Exception;


require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/entidadInstitucionModel.php";

class EntidadInstitucionController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'entidadInstitucion_layout';
    }

    public function initEntidadInstitucion()
    {
        try {
            $objEntidadInstitucion = new EntidadInstitucionModel();
            $entidadInstituciones = $objEntidadInstitucion->getAll();
            
            $data = [
                'title' => 'Lista de Instituciones',
                "entidadInstituciones" => $entidadInstituciones,
            ];
            $this->render("EntidadInstitucion/viewEntidadInstitucion.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in EntidadInstitucionController->initEntidadInstitucion: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Instituciones',
                "entidadInstituciones" => [],
                "error" => "Error al cargar las instituciones"
            ];
            $this->render("EntidadInstitucion/viewEntidadInstitucion.php", $data);
        }
    }

    // Muestra el formulario para nueva institución
    public function new()
    {
        $this->render('EntidadInstitucion/newEntidadInstitucion.php');
    }

    // Guarda los datos del formulario
    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        if ($nombre) {
            $objEntidadInstitucion = new EntidadInstitucionModel(null, $nombre);
            $resp = $objEntidadInstitucion->save();
            if ($resp) {
                header('Location:/entidadInstitucion/init');
            } else {
                header('Location:/entidadInstitucion/init');
            };
        }
    }

    public function view($id)
    {
        $objEntidadInstitucion = new EntidadInstitucionModel($id);
        $entidadInstitucionInfo = $objEntidadInstitucion->getEntidadInstitucion();
        $data = [
            "id" => $entidadInstitucionInfo[0]->id,
            "nombre" => $entidadInstitucionInfo[0]->nombre,
        ];
        $this->render("EntidadInstitucion/viewOneEntidadInstitucion.php", $data);
    }

    // Mostrar lo que se quiere editar 
    public function editEntidadInstitucion($id)
    {
        $objEntidadInstitucion = new EntidadInstitucionModel($id);
        $entidadInfo = $objEntidadInstitucion->getEntidadInstitucion();
        $data = [
            "infoReal" => $entidadInfo[0],
        ];
        $this->render("EntidadInstitucion/editEntidadInstitucion.php", $data);
    }

    // Se edita como tal en la BD
    public function updateEntidadInstitucion()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $entidadInstitucionObjEdit = new EntidadInstitucionModel($id, $nombre);
            $res = $entidadInstitucionObjEdit->editEntidadInstitucion();
            if ($res) {
                header('Location:/entidadInstitucion/init');
            } else {
                header('Location:/entidadInstitucion/init');
            }
        }
    }

    public function deleteEntidadInstitucion($id)
    {
        if (isset($id)) {
            $entidadInstitucionObjDelete = new EntidadInstitucionModel($id);
            $res = $entidadInstitucionObjDelete->deleteEntidadInstitucion();
            if ($res) {
                header('Location:/entidadInstitucion/init');
            } else {
                header('Location:/entidadInstitucion/init');
            }
        }
    }
}