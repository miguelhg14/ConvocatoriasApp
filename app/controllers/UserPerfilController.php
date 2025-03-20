<?php

namespace App\Controller;

use Exception;
use App\Models\UserPerfilModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/UserPerfilModel.php";

class PerfilUserController extends BaseController
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
            $idUsuario = !empty($_POST['idUsuario']) ? (int)$_POST['idUsuario'] : null;
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $contrasenia = trim($_POST['contrasenia'] ?? '');
            $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;
    
            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($idRol)) {
                $this->render("userPerfil/editarPerfil.php", ["error" => "Todos los campos obligatorios deben ser completados"]);
                return;
            }
    
            // Validar formato del correo
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->render("userPerfil/editarPerfil.php", ["error" => "El correo electrónico no es válido"]);
                return;
            }
    
            try {
                $usuarioModel = new UserPerfilModel();
    
                // Hashear la contraseña si se proporciona
                if (!empty($contrasenia)) {
                    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
                }
    
                if ($idUsuario) {
                    $result = $usuarioModel->actualizarPerfil($idUsuario, $nombre, $apellido, $correo, $contrasenia, $idRol);
                } else {
                    $result = $usuarioModel->crearUsuario($nombre, $apellido, $correo, $contrasenia, $idRol);
                }
    
                if ($result) {
                    header("Location: /userPerfil/ver/$idUsuario");
                    exit();
                } else {
                    $this->render("userPerfil/editarPerfil.php", ["error" => "Error al guardar el perfil"]);
                }
            } catch (Exception $e) {
                error_log("Error al guardar perfil: " . $e->getMessage());
                $this->render("userPerfil/editarPerfil.php", ["error" => "Error al procesar la solicitud"]);
            }
        } else {
            // Mostrar el formulario de creación/edición
            $idUsuario = $_GET['id'] ?? null;
    
            if ($idUsuario) {
                try {
                    $usuarioModel = new UserPerfilModel();
                    $usuario = $usuarioModel->obtenerPerfilPorId($idUsuario);
    
                    if ($usuario) {
                        $this->render("userPerfil/editarPerfil.php", ["usuario" => $usuario]);
                    } else {
                        $this->render("userPerfil/editarPerfil.php", ["error" => "Usuario no encontrado"]);
                    }
                } catch (Exception $e) {
                    error_log("Error al obtener usuario: " . $e->getMessage());
                    $this->render("userPerfil/editarPerfil.php", ["error" => "Error al cargar el perfil"]);
                }
            } else {
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