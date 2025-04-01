<?php

namespace App\Controller;

use App\Models\LineaModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/lineaModel.php";

class LineaController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'linea_layout';
    }

    public function initLinea()
    {
        try {
            $objLinea = new LineaModel();
            $lineas = $objLinea->getAll();
            
            $data = [
                'title' => 'Lista de Líneas',
                "lineas" => $lineas,
            ];
            $this->render("linea/viewLinea.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in LineaController->initLinea: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Líneas',
                "lineas" => [],
                "error" => "Error al cargar las líneas"
            ];
          
        }
    }

    // Muestra el formulario para nueva línea
    public function new()
    {
        $this->render('linea/newLinea.php');
    }
    //Guarada los datos del formulario
    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;
        if ($nombre) {
            $objLinea = new LineaModel(null, $nombre,$descripcion);
            $resp = $objLinea->save();
            if ($resp) {
                header('Location:/linea/init');
            } else {
                header('Location:/linea/init');
            };
        }
    }

    public function view($id)
    {

        $objLinea = new LineaModel($id);
        $LineaInfo = $objLinea->getLinea();
        $data = [
            "id" => $LineaInfo[0]->id,
            "nombre" => $LineaInfo[0]->nombre,
            "descripcion" => $LineaInfo[0]->descripcion,
        ];
        $this->render("linea/viewOneLinea.php", $data);

        // Crear el objeto rol
        // Traer la informacion de ese rol desde la base de datos
    }


    // Mostrar lo que se quiere editar 
    public function editLinea($id)
    {
        $objLinea = new LineaModel($id);
        $lineaInfo = $objLinea->getLinea();
        $data = [
            "infoReal" => $lineaInfo[0],
        ];
        $this->render("linea/editLinea.php", $data);
    }

    // Se edita como tal en la BD
    public function updateLinea()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $descripcion = $_POST["descripcion"] ?? null;
            $lineaObjEdit = new LineaModel($id, $nombre,$descripcion);
            $res = $lineaObjEdit->editLinea();
            if ($res) {
                header('Location:/linea/init');
            }else {
                header('Location:/linea/init');
            }
        }
    }

    public function deleteLinea($id)
    {
        echo $id;
        if (isset($id)) {
            $LineaObjDelete = new LineaModel($id);
            $res = $LineaObjDelete->deleteLinea();
            print_r($res);
            if ($res) {
                header('Location:/linea/init');
            }else {
                header('Location:/linea/init');
            }
        }
    }
}