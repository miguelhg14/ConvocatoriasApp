<?php

namespace App\Controller;

use Exception;
use App\Models\InteresesModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/interesesModel.php";

class InteresesController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'admin_layout';
    }

    public function index()
    {
        try {
            $interesesModel = new InteresesModel();
            $intereses = $interesesModel->getAll();
            
            $this->render('intereses/index.php', [
                'intereses' => $intereses
            ]);
        } catch (Exception $e) {
            error_log("Error loading interests: " . $e->getMessage());
            $this->render('intereses/index.php', [
                'error' => 'Error al cargar los intereses',
                'intereses' => []
            ]);
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            
            if (empty($nombre)) {
                $this->render('intereses/create.php', [
                    'error' => 'El nombre es requerido'
                ]);
                return;
            }

            try {
                $interes = new InteresesModel(null, $nombre);
                if ($interes->save()) {
                    header('Location: /intereses');
                    exit();
                } else {
                    $this->render('intereses/create.php', [
                        'error' => 'Error al guardar el interés'
                    ]);
                }
            } catch (Exception $e) {
                error_log("Error creating interest: " . $e->getMessage());
                $this->render('intereses/create.php', [
                    'error' => 'Error al procesar la solicitud'
                ]);
            }
        } else {
            $this->render('intereses/create.php');
        }
    }

    public function edit($id)
    {
        try {
            $interesModel = new InteresesModel($id);
            $interes = $interesModel->getInteres();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = trim($_POST['nombre'] ?? '');
                
                if (empty($nombre)) {
                    $this->render('intereses/edit.php', [
                        'error' => 'El nombre es requerido',
                        'interes' => $interes
                    ]);
                    return;
                }

                $interesModel = new InteresesModel($id, $nombre);
                if ($interesModel->editInteres()) {
                    header('Location: /intereses');
                    exit();
                } else {
                    $this->render('intereses/edit.php', [
                        'error' => 'Error al actualizar el interés',
                        'interes' => $interes
                    ]);
                }
            } else {
                $this->render('intereses/edit.php', [
                    'interes' => $interes
                ]);
            }
        } catch (Exception $e) {
            error_log("Error editing interest: " . $e->getMessage());
            $this->render('intereses/edit.php', [
                'error' => 'Error al procesar la solicitud'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $interesModel = new InteresesModel($id);
            if ($interesModel->deleteInteres()) {
                header('Location: /intereses');
                exit();
            } else {
                $this->render('intereses/index.php', [
                    'error' => 'Error al eliminar el interés'
                ]);
            }
        } catch (Exception $e) {
            error_log("Error deleting interest: " . $e->getMessage());
            $this->render('intereses/index.php', [
                'error' => 'Error al procesar la solicitud'
            ]);
        }
    }
}