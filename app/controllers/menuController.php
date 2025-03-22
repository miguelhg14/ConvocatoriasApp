<?php

namespace App\Controller;

use App\Models\MenuModel;
use App\Models\ConvocatoriaModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/menuModel.php";
require_once MAIN_APP_ROUTE . "../models/convocatoriaModel.php";

class MenuController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'admin_layout';
    }

    public function initMenu()
    {
        try {
            $convocatoriaModel = new ConvocatoriaModel();
            $convocatorias = $convocatoriaModel->getAll();
            
            $data = [
                "convocatorias" => $convocatorias,
                "title" => "Convocatorias Disponibles"
            ];
            
            $this->render("/admin/admin.php", $data);
            
        } catch (Exception $e) {
            error_log("Error loading convocatorias: " . $e->getMessage());
            $data = [
                "error" => "Error al cargar las convocatorias",
                "convocatorias" => []
            ];
            $this->render("/admin/admin.php", $data);
        }
    }
}