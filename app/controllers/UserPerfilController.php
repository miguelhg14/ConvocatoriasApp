<?php

namespace App\Controller;

use Exception;
use App\Models\UserPerfilModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/UserPerfilModel.php";

class UserPerfilController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'dashboard_layout'; // Puedes cambiar el layout si es necesario
    }

    /**
     * Maneja la creación y actualización del perfil del usuario.
     */
    public function initUserPerfil()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar los datos del formulario
            $idUsuario = !empty($_POST['idUsuario']) ? (int)$_POST['idUsuario'] : null;
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $contrasenia = trim($_POST['contrasenia'] ?? '');
            $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;

            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($idRol)) {
                $error = "Todos los campos obligatorios deben ser completados";
                $this->render("userPerfil/editarPerfil.php", ["error" => $error]);
                return;
            }

            try {
                $usuarioModel = new UserPerfilModel();

                // Si hay un ID de usuario, es una actualización; de lo contrario, es una creación
                if ($idUsuario) {
                    $result = $usuarioModel->actualizarPerfil($idUsuario, $nombre, $apellido, $correo, $contrasenia, $idRol);
                } else {
                    $result = $usuarioModel->crearUsuario($nombre, $apellido, $correo, $contrasenia, $idRol);
                }

                if ($result) {
                    header("Location: /userPerfil/ver/$idUsuario");
                    exit();
                } else {
                    $error = "Error al guardar el perfil";
                    $this->render("userPerfil/editarPerfil.php", ["error" => $error]);
                }
            } catch (Exception $e) {
                error_log("Error al guardar perfil: " . $e->getMessage());
                $error = "Error al procesar la solicitud";
                $this->render("userPerfil/editarPerfil.php", ["error" => $error]);
            }
        } else {
            // Mostrar el formulario de creación/edición
            $idUsuario = $_GET['id'] ?? null;

            if ($idUsuario) {
                // Si hay un ID, es una edición; obtener los datos del usuario
                try {
                    $usuarioModel = new UserPerfilModel();
                    $usuario = $usuarioModel->obtenerPerfilPorId($idUsuario);

                    if ($usuario) {
                        $this->render("userPerfil/editarPerfil.php", ["usuario" => $usuario]);
                    } else {
                        $error = "Usuario no encontrado";
                        $this->render("userPerfil/editarPerfil.php", ["error" => $error]);
                    }
                } catch (Exception $e) {
                    error_log("Error al obtener usuario: " . $e->getMessage());
                    $error = "Error al cargar el perfil";
                    $this->render("userPerfil/editarPerfil.php", ["error" => $error]);
                }
            } else {
                // Si no hay ID, es una creación; mostrar el formulario vacío
                $this->render("userPerfil/editarPerfil.php");
            }
        }
    }

    /**
     * Muestra los detalles del perfil del usuario.
     */
    public function verPerfil($idUsuario)
    {
        try {
            $usuarioModel = new UserPerfilModel();
            $usuario = $usuarioModel->obtenerPerfilPorId($idUsuario);

            if ($usuario) {
                $this->render("userPerfil/verPerfil.php", ["usuario" => $usuario]);
            } else {
                $error = "Usuario no encontrado";
                $this->render("userPerfil/verPerfil.php", ["error" => $error]);
            }
        } catch (Exception $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
            $error = "Error al cargar el perfil";
            $this->render("userPerfil/verPerfil.php", ["error" => $error]);
        }
    }
}