<?php

namespace App\Controller;

use Exception;
use App\Models\ConvocatoriaModel;
use App\Models\InteresesModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/convocatoriaModel.php";
require_once MAIN_APP_ROUTE . "../models/interesesModel.php";  // Add this line

class ConvocatoriaController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'convocatorias_layout';
    }

    public function initConvocatoria()
    {
        try {
            // Get interests for categories
            $interesesModel = new InteresesModel();
            $intereses = $interesesModel->getAll();
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get and trim all form data
                $nombre = trim($_POST['nombre'] ?? '');
                $fechaRevision = trim($_POST['fechaRevision'] ?? '');
                $fechaCierre = trim($_POST['fechaCierre'] ?? '');
                $descripcion = trim($_POST['descripcion'] ?? '');
                $objetivo = trim($_POST['objetivo'] ?? '');
                $observaciones = trim($_POST['observaciones'] ?? '');
                $fkIdEntidad = 1;
                $idUsuario = 1;
                $fkIdInvestigador = 1;
                // $imagen = null;
                // if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
                //     $imagen = $_FILES['imagen']['name'];
                // }

    
                // Validate required fields
                if (
                    empty($nombre) || empty($descripcion) || empty($fechaRevision) ||
                    empty($fechaCierre) || empty($objetivo) || empty($observaciones) ||
                    empty($fkIdEntidad)
                ) {
                    $error = "Los campos obligatorios no pueden estar vacíos";
                    $this->render("convocatorias/convocatorias.php", [
                        "error" => $error,
                        "intereses" => $intereses
                    ]);
                    return; // Add this to prevent further execution
                }
    
                try {
                    $convocatoria = new ConvocatoriaModel();
                    $result = $convocatoria->crearConvocatoria(
                        $nombre,
                        $descripcion,
                        $fechaRevision,
                        $fechaCierre,
                        $objetivo,
                        $observaciones,
                        $fkIdEntidad,
                        $idUsuario,
                        $fkIdInvestigador,
                    );
    
                    if ($result) {
                        header("Location: /convocatoria/lista");
                        exit();
                    } else {
                        $error = "Error al crear la convocatoria";
                        $this->render("convocatorias/convocatorias.php", ["error" => $error]);
                    }
                } catch (Exception $e) {
                    error_log("Error al crear convocatoria: " . $e->getMessage());
                    $error = "Error al procesar la solicitud";
                    $this->render("convocatorias/convocatorias.php", ["error" => $error]);
                }
            } else {
                // Display the form
                $this->render('convocatorias/convocatorias.php', [
                    'intereses' => $intereses
                ]);
            }
        } catch (Exception $e) {
            error_log("Error loading interests: " . $e->getMessage());
            $this->render('convocatorias/convocatorias.php', [
                'error' => 'Error al cargar las categorías',
                'intereses' => []
            ]);
        }
    }

    public function edit($id) {
        try {
            $convocatoriaModel = new ConvocatoriaModel();
            $interesesModel = new InteresesModel();

            $convocatoria = $convocatoriaModel->getConvocatoriaById($id);
            $intereses = $interesesModel->getAll();

            if (!$convocatoria) {
                header("Location: /convocatoria/lista");
                exit();
            }

            $this->render('convocatorias/edit.php', [
                'convocatoria' => $convocatoria,
                'intereses' => $intereses
            ]);
        } catch (Exception $e) {
            error_log("Error in edit: " . $e->getMessage());
            header("Location: /convocatoria/lista");
            exit();
        }
    }

    public function update($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Use ID from URL if available, otherwise from POST
                $id = $id ?? $_POST['id'] ?? null;
                if (!$id) {
                    throw new Exception("ID no válido");
                }

                // Get and trim all form data
                $data = [
                    'nombre' => trim($_POST['nombre'] ?? ''),
                    'descripcion' => trim($_POST['descripcion'] ?? ''),
                    'fechaRevision' => trim($_POST['fecha_inicio'] ?? ''),
                    'fechaFin' => trim($_POST['fecha_fin'] ?? ''),
                    'objetivo' => trim($_POST['objetivo'] ?? ''),
                    'observaciones' => trim($_POST['observaciones'] ?? ''),
                    'fkIdEntidad' => trim($_POST['fkIdEntidad'] ?? ''),
                    'fkIdInvestigador' => trim($_POST['fkIdInvestigador'] ?? ''),
                    'enlaceInscripcion' => trim($_POST['enlace_inscripcion'] ?? ''),
                    'idInteres' => !empty($_POST['idInteres']) ? (int)$_POST['idInteres'] : null,
                    'idInstitucion' => 1 // Temporary default value
                ];

                // Validate required fields based on database schema
                if (empty($data['nombre']) || empty($data['descripcion']) || 
                    empty($data['fechaRevision']) || empty($data['fechaFin']) || 
                    empty($data['objetivo']) || empty($data['fkIdEntidad']) || 
                    empty($data['idInteres'])) {
                    throw new Exception("Faltan campos requeridos");
                }

                // Handle image upload if present
                $imagen = null;
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                    $imagen = $_FILES['imagen']['name'];
                    // Add your image upload logic here
                }

                $convocatoriaModel = new ConvocatoriaModel();
                $result = $convocatoriaModel->updateConvocatoria(
                    $id,
                    $data['nombre'],
                    $data['descripcion'],
                    $data['fechaRevision'],
                    $data['fechaFin'],
                    $data['objetivo'],
                    $data['observaciones'],
                    $data['fkIdEntidad'],
                    $data['fkIdInvestigador'],
                    $data['enlaceInscripcion'],
                    $imagen,
                    $data['idInteres']
                );

                if ($result) {
                    header("Location: /convocatoria/lista");
                    exit();
                } else {
                    throw new Exception("Error al actualizar la convocatoria");
                }
            } catch (Exception $e) {
                error_log("Error en actualización: " . $e->getMessage());
                
                // Get intereses for the form
                $interesesModel = new InteresesModel();
                $intereses = $interesesModel->getAll();
                
                $this->render('convocatorias/edit.php', [
                    'error' => $e->getMessage(),
                    'convocatoria' => $_POST,
                    'intereses' => $intereses
                ]);
                return;
            }
        }
        header("Location: /convocatoria/lista");
        exit();
    }

    public function delete($id) {
        if ($id) {
            $convocatoriaModel = new ConvocatoriaModel();
            $result = $convocatoriaModel->deleteConvocatoria($id);
            
            if ($result) {
                header("Location: /convocatoria/lista");
                exit();
            }
        }
        header("Location: /convocatoria/lista");
    }

    public function lista() {
        try {
            $convocatoriaModel = new ConvocatoriaModel();
            $convocatorias = $convocatoriaModel->getAll();
            
            $this->render('convocatorias/lista.php', [
                'convocatorias' => $convocatorias
            ]);
        } catch (Exception $e) {
            error_log("Error loading convocatorias: " . $e->getMessage());
            $this->render('convocatorias/lista.php', [
                'error' => 'Error al cargar las convocatorias',
                'convocatorias' => []
            ]);
        }
    }
}
