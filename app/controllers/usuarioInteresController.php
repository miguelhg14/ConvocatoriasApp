<?php

namespace App\Controller;

use App\Models\UsuarioInteresModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/usuarioInteresModel.php";

class UsuarioInteresController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'dashboard_layout';
    }

    // Asigna un interés a un usuario
    public function asignarInteres(): void
    {
        $idUsuario = $_POST['idUsuario'] ?? null;
        $idInteres = $_POST['idInteres'] ?? null;

        if (empty($idUsuario) || empty($idInteres)) {
            $error = "Datos incompletos";
            $this->render("usuarios/asignarInteres.php", ["error" => $error]);
            return;
        }

        try {
            $usuarioInteresModel = new UsuarioInteresModel();
            $resp = $usuarioInteresModel->asignarInteres($idUsuario, $idInteres);
            if ($resp) {
                header('Location:/usuario/detalle/' . $idUsuario);
            } else {
                $error = "Error al asignar el interés";
                $this->render("usuarios/asignarInteres.php", ["error" => $error]);
            }
        } catch (Exception $e) {
            error_log("Error in UsuarioInteresController->asignarInteres: " . $e->getMessage());
            $error = "Error al procesar la solicitud";
            $this->render("usuarios/asignarInteres.php", ["error" => $error]);
        }
    }

    // Elimina un interés de un usuario
    public function eliminarInteres($idUsuario, $idInteres)
    {
        if (empty($idUsuario) || empty($idInteres)) {
            header('Location:/usuario/detalle/' . $idUsuario);
            return;
        }

        try {
            $usuarioInteresModel = new UsuarioInteresModel();
            $resp = $usuarioInteresModel->eliminarInteres($idUsuario, $idInteres);
            if ($resp) {
                header('Location:/usuario/detalle/' . $idUsuario);
            } else {
                $error = "Error al eliminar el interés";
                $this->render("usuarios/detalleUsuario.php", ["error" => $error]);
            }
        } catch (Exception $e) {
            error_log("Error in UsuarioInteresController->eliminarInteres: " . $e->getMessage());
            $error = "Error al procesar la solicitud";
            $this->render("usuarios/detalleUsuario.php", ["error" => $error]);
        }
    }
}