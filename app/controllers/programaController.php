<?php
namespace App\Controller;
use App\Models\ProModel;
use App\Models\CenModel;
use Exception;

require_once MAIN_APP_ROUTE."../controllers/baseController.php";
require_once MAIN_APP_ROUTE."../models/proModel.php";
require_once MAIN_APP_ROUTE."../models/cenModel.php";

class ProgramaController extends BaseController{
    public function __construct()
    {
        $this->layout = 'dashboard_layout';
    }
    public function index()
        {
            try {
                $objPro = new ProModel();
                $programas = $objPro->getAllPrograma();
                
                $data = [
                    "title" => "Lista de Programas",
                    "programas" => $programas
                ];
                
                $this->render("programas/viewPrograma.php", $data);
                
            } catch (Exception $e) {
                error_log("Error in ProgramaController->index: " . $e->getMessage());
                $data = [
                    "title" => "Lista de Programas",
                    "programas" => [],
                    "error" => "Error al cargar los programas"
                ];
                $this->render("programas/viewPrograma.php", $data);
            }
        }
    public function new()
    {
        $objPro = new CenModel();
        $centros = $objPro->getAll();
        //Llamando a la vista
        $data=[
            "centros"=> $centros,
        ];
        $this->render("programas/newPrograma.php", $data);
        // $this->render('programas/newPrograma.php');
    }

    //Guarada los datos del formulario
    public function create()
    {
        
        $codigo = $_POST['txtCodigo'] ?? null;
        $nombre = $_POST['txtNombre'] ?? null;
        $FkIdCentroFormacion = $_POST['txtFkIdCentroFormacion'] ?? null;
        if ($nombre) {
            $objAct = new ProModel(null, $codigo,$nombre, $FkIdCentroFormacion);
            $resp = $objAct->save();
            if ($resp) {
                header('Location:/programa/index');
            } else {
                header('Location:/programa/index');
            };
        }
    }

    public function view($id)
    {

        $objAct = new ProModel($id);
        $actInfo = $objAct->getAllPrograma();
        $data = [
            "id" => $actInfo[0]->id,
            "codigo" => $actInfo[0]->codigo,
            "nombre" => $actInfo[0]->nombre,
            "nombreCentro" => $actInfo[0]->nombreCentro,
        ];
        $this->render("programas/viewOnePrograma.php", $data);

        // Crear el objeto rol
        // Traer la informacion de ese rol desde la base de datos
    }

    // Mostrar lo que se quiere editar 
    public function editPrograma($id)
    {
        $objAct = new ProModel($id);
        $actividadInfo = $objAct->getPrograma();
        $data = [
            "infoReal" => $actividadInfo[0],
        ];
        $this->render("programas/editPrograma.php", $data);
    }

    // Se edita como tal en la BD
    public function updatePrograma()
    {
        if (isset($_POST["txtId"])) {
            $id = $_POST["txtId"] ?? null;
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST["txtNombre"] ?? null;
            $FkIdCentroFormacion = $_POST['txtFkIdCentroFormacion'] ?? null;
            $actividadObjEdit = new ProModel($id, $codigo, $nombre, $FkIdCentroFormacion);
            $res = $actividadObjEdit->editPrograma();
            if ($res) {
                header('Location:/programa/index');
            }else {
                header('Location:/programa/index');
            }
        }
    }

//     public function deleteActividad($id)
//     {
//         echo $id;
//         if (isset($id)) {
//             $actividadObjDelete = new ActModel($id);
//             $res = $actividadObjDelete->deleteActividad();
//             print_r($res);
//             if ($res) {
//                 header('Location:/actividad/index');
//             }else {
//                 header('Location:/actividad/index');
//             }
//         }
//     }
// }
}