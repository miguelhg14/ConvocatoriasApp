<?php

namespace App\Controller;

use Exception;
use App\Models\UsuarioModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/UserPerfilModel.php";

class AdministrarUsuarioController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'dashboard_layout'; // Puedes cambiar el layout si es necesario
    }

     /**
     * Maneja la creación y actualización de usuarios.
     */
    public function initAdministrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar los datos del formulario
            $idUsuario = !empty($_POST['idUsuario']) ? (int)$_POST['idUsuario'] : null;
            $nombre = trim(string: $_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $contrasenia = trim($_POST['contrasenia'] ?? '');
            $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;

            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($idRol)) {
                $error = "Todos los campos obligatorios deben ser completados";
                $this->render("adminUser/administrarUsuarios.php", ["error" => $error]);
                return;
            }

            try {
                $usuarioModel = new UsuarioModel();

                // Si hay un ID de usuario, es una actualización; de lo contrario, es una creación
                if ($idUsuario) {
                    $result = $usuarioModel->actualizarUsuario($idUsuario, $nombre, $apellido, $correo, $contrasenia, $idRol);
                } else {
                    $result = $usuarioModel->crearUsuario($nombre, $apellido, $correo, $contrasenia, $idRol);
                }

                if ($result) {
                    header("Location: /usuarios/lista");
                    exit();
                } else {
                    $error = "Error al guardar el usuario";
                    $this->render("adminUser/administrarUsuarios.php", ["error" => $error]);
                }
            } catch (Exception $e) {
                error_log("Error al guardar usuario: " . $e->getMessage());
                $error = "Error al procesar la solicitud";
                $this->render("adminUser/administrarUsuarios.php", ["error" => $error]);
            }
        } else {
            // Mostrar el formulario de creación/edición
            $idUsuario = $_GET['id'] ?? null;

            if ($idUsuario) {
                // Si hay un ID, es una edición; obtener los datos del usuario
                try {
                    $usuarioModel = new UsuarioModel();
                    $usuario = $usuarioModel->obtenerUsuarioPorId($idUsuario);

                    if ($usuario) {
                        $this->render("adminUser/administrarUsuarios.php", ["usuario" => $usuario]);
                    } else {
                        $error = "Usuario no encontrado";
                        $this->render("adminUser/administrarUsuarios.php", ["error" => $error]);
                    }
                } catch (Exception $e) {
                    error_log("Error al obtener usuario: " . $e->getMessage());
                    $error = "Error al cargar el usuario";
                    $this->render("adminUser/administrarUsuarios.php", ["error" => $error]);
                }
            } else {
                // Si no hay ID, es una creación; mostrar el formulario vacío
                $this->render("adminUser/administrarUsuarios.php");
            }
        }
    }

    /**
     * Muestra la lista de usuarios.
     */
    public function listarUsuarios()
    {
        try {
            $usuarioModel = new UsuarioModel();
            $usuarios = $usuarioModel->obtenerTodosLosUsuarios();
            $this->render("adminUser/viewUser.php", ["usuarios" => $usuarios]);
        } catch (Exception $e) {
            error_log("Error al listar usuarios: " . $e->getMessage());
            $error = "Error al cargar la lista de usuarios";
            $this->render("adminUser/viewUser.php", ["error" => $error]);
        }
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function nuevoUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar los datos del formulario
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $contrasenia = trim($_POST['contrasenia'] ?? '');
            $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;

            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasenia) || empty($idRol)) {
                $error = "Todos los campos obligatorios deben ser completados";
                $this->render("adminUser/newUser.php", ["error" => $error]);
                return;
            }

            try {
                $usuarioModel = new UsuarioModel();
                $result = $usuarioModel->crearUsuario($nombre, $apellido, $correo, $contrasenia, $idRol);

                if ($result) {
                    header("Location: /usuarios/lista");
                    exit();
                } else {
                    $error = "Error al crear el usuario";
                    $this->render("usuarios/newUser.php", ["error" => $error]);
                }
            } catch (Exception $e) {
                error_log("Error al crear usuario: " . $e->getMessage());
                $error = "Error al procesar la solicitud";
                $this->render("adminUser/newUser.php", ["error" => $error]);
            }
        } else {
            // Mostrar el formulario de creación
            $this->render("usuarios/newUser.php");
        }
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function editarUsuario($idUsuario)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar los datos del formulario
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $contrasenia = trim($_POST['contrasenia'] ?? '');
            $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;

            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($idRol)) {
                $error = "Todos los campos obligatorios deben ser completados";
                $this->render("usuarios/editUser.php", ["error" => $error, "idUsuario" => $idUsuario]);
                return;
            }

            try {
                $usuarioModel = new UsuarioModel();
                $result = $usuarioModel->actualizarUsuario($idUsuario, $nombre, $apellido, $correo, $contrasenia, $idRol);

                if ($result) {
                    header("Location: /usuarios/lista");
                    exit();
                } else {
                    $error = "Error al actualizar el usuario";
                    $this->render("usuarios/editUser.php", ["error" => $error, "idUsuario" => $idUsuario]);
                }
            } catch (Exception $e) {
                error_log("Error al actualizar usuario: " . $e->getMessage());
                $error = "Error al procesar la solicitud";
                $this->render("usuarios/editUser.php", ["error" => $error, "idUsuario" => $idUsuario]);
            }
        } else {
            // Mostrar el formulario de edición con los datos actuales del usuario
            try {
                $usuarioModel = new UsuarioModel();
                $usuario = $usuarioModel->obtenerUsuarioPorId($idUsuario);

                if ($usuario) {
                    $this->render("usuarios/editUser.php", ["usuario" => $usuario]);
                } else {
                    $error = "Usuario no encontrado";
                    $this->render("usuarios/editUser.php", ["error" => $error]);
                }
            } catch (Exception $e) {
                error_log("Error al obtener usuario: " . $e->getMessage());
                $error = "Error al cargar el usuario";
                $this->render("usuarios/editUser.php", ["error" => $error]);
            }
        }
    }

    /**
     * Muestra los detalles de un usuario específico.
     */
    public function verUsuario($idUsuario)
    {
        try {
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->obtenerUsuarioPorId($idUsuario);

            if ($usuario) {
                $this->render("usuarios/viewOneUser.php", ["usuario" => $usuario]);
            } else {
                $error = "Usuario no encontrado";
                $this->render("usuarios/viewOneUser.php", ["error" => $error]);
            }
        } catch (Exception $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
            $error = "Error al cargar el usuario";
            $this->render("usuarios/viewOneUser.php", ["error" => $error]);
        }
    }

    /**
     * Elimina un usuario.
     */
    public function eliminarUsuario($idUsuario)
    {
        try {
            $usuarioModel = new UsuarioModel();
            $result = $usuarioModel->eliminarUsuario($idUsuario);

            if ($result) {
                header("Location: /usuarios/lista");
                exit();
            } else {
                $error = "Error al eliminar el usuario";
                $this->render("usuarios/viewUser.php", ["error" => $error]);
            }
        } catch (Exception $e) {
            error_log("Error al eliminar usuario: " . $e->getMessage());
            $error = "Error al procesar la solicitud";
            $this->render("usuarios/viewUser.php", ["error" => $error]);
        }
    }
}