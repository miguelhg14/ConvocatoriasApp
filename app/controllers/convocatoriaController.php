<?php

namespace App\Controller;

use Exception;

use App\Models\ConvocatoriaModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/convocatoriaModel.php";

class ConvocatoriaController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'convocatorias_layout';
    }

    public function initConvocatoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get and trim all form data
            $nombre = trim($_POST['txtNombre'] ?? '');
            $descripcion = trim($_POST['txtDescripcion'] ?? '');
            $fechaInicio = trim($_POST['txtFechaInicio'] ?? '');
            $fechaFin = trim($_POST['txtFechaFin'] ?? '');
            $requisitos = trim($_POST['txtRequisitos'] ?? '');
            $beneficios = trim($_POST['txtBeneficios'] ?? '');
            $modalidad = trim($_POST['txtModalidad'] ?? '');
            $ubicacion = trim($_POST['txtUbicacion'] ?? '');
            $enlaceInscripcion = trim($_POST['txtEnlaceInscripcion'] ?? '');
            $imagen = trim($_POST['txtImagen'] ?? '');
            $idInstitucion = !empty($_POST['txtIdInstitucion']) ? (int)$_POST['txtIdInstitucion'] : null;
            $idInteres = !empty($_POST['txtIdInteres']) ? (int)$_POST['txtIdInteres'] : null;

            // Validate required fields
            if (
                empty($nombre) || empty($descripcion) || empty($fechaInicio) ||
                empty($fechaFin) || empty($requisitos) || empty($beneficios) ||
                empty($modalidad) || empty($ubicacion)
            ) {
                $error = "Los campos obligatorios no pueden estar vacíos";
                $this->render("convocatorias/convocatorias.php", ["error" => $error]);
                return;
            }

            try {
                $convocatoria = new ConvocatoriaModel();
                $result = $convocatoria->crearConvocatoria(
                    $nombre,
                    $descripcion,
                    $fechaInicio,
                    $fechaFin,
                    $requisitos,
                    $beneficios,
                    $modalidad,
                    $ubicacion,
                    $enlaceInscripcion,
                    $imagen,
                    $idInstitucion,
                    $idInteres
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
            $this->render('convocatorias/convocatorias.php');
        }
    }
}
