<?php

namespace App\Controller;

use Exception;
use App\Models\AdministrarUsuarioModel;
use App\Models\RolModel; 


require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/AdministrarUsuarioModel.php";

class AdministrarUsuarioController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'usuarios_layout';
    }

    public function initUsuario(): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener y limpiar los datos del formulario
                $nombre = trim($_POST['nombre'] ?? '');
                $apellido = trim($_POST['apellido'] ?? '');
                $correo = trim($_POST['correo'] ?? '');
                $contrasenia = trim($_POST['contrasenia'] ?? '');
                $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;
    
                // Validar campos obligatorios
                if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasenia) || empty($idRol)) {
                    throw new Exception("Todos los campos son obligatorios.");
                }
    
                // Crear el usuario en la base de datos
                $usuarioModel = new AdministrarUsuarioModel();
                $result = $usuarioModel->crearUsuario(
                    $nombre,
                    $apellido,
                    $correo,
                    $contrasenia,
                    $idRol
                );
    
                if ($result) {
                    header("Location: /administrarUsuario/lista");
                    exit();
                } else {
                    throw new Exception("Error al crear el usuario.");
                }
            } else {
                // Obtener los roles para el formulario de creación
                $rolModel = new RolModel();
                $roles = $rolModel->obtenerRoles();
    
                // Depuración: Verificar los roles obtenidos
                error_log("Roles obtenidos: " . print_r($roles, true));
    
                // Mostrar el formulario de creación con los roles
                $this->render('adminUser/crear.php', [
                    'roles' => $roles
                ]);
            }
        } catch (Exception $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
            $this->render('adminUser/crear.php', [
                'error' => $e->getMessage(),
                'roles' => $roles ?? []
            ]);
        }
    }

    public function edit($id)
{
    error_log("Intentando editar usuario con ID: $id"); // Depuración
    try {
        $usuarioModel = new AdministrarUsuarioModel();
        $usuario = $usuarioModel->getUsuarioById($id);

        if (!$usuario) {
            error_log("Usuario no encontrado con ID: $id"); // Depuración
            header("Location: /administrarUsuario/lista");
            exit();
        }

        // Obtener los roles para el formulario de edición
        $rolModel = new RolModel();
        $roles = $rolModel->obtenerRoles();

        // Pasar la vista al layout
        $this->render('adminUser/editar.php', [
            'usuario' => $usuario,
            'roles' => $roles,
            'content' => 'adminUser/editar.php' // Asegúrate de pasar la vista correcta
        ]);
    } catch (Exception $e) {
        error_log("Error al editar usuario: " . $e->getMessage());
        header("Location: /administrarUsuario/lista");
        exit();
    }
}

    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Usar el ID de la URL si está disponible, de lo contrario, del POST
                $id = $id ?? intval($_POST['id'] ?? 0);
                if ($id <= 0) {
                    throw new Exception("ID no válido");
                }
    
                // Obtener y limpiar los datos del formulario
                $nombre = filter_var(trim($_POST['nombre'] ?? ''), FILTER_SANITIZE_STRING);
                $apellido = filter_var(trim($_POST['apellido'] ?? ''), FILTER_SANITIZE_STRING);
                $correo = filter_var(trim($_POST['correo'] ?? ''), FILTER_SANITIZE_EMAIL);
                $contrasenia = trim($_POST['contrasenia'] ?? '');
                $idRol = intval($_POST['idRol'] ?? 0);
    
                // Validar campos obligatorios
                if (empty($nombre) || empty($apellido) || empty($correo) || $idRol <= 0) {
                    throw new Exception("Todos los campos obligatorios deben ser completados");
                }
    
                // Verificar si el rol existe
                $rolModel = new RolModel();
                $rol = $rolModel->obtenerRolPorId($idRol);
    
                if (!$rol) {
                    throw new Exception("El rol seleccionado no es válido");
                }
    
                // Actualizar el usuario en la base de datos
                $usuarioModel = new AdministrarUsuarioModel();
                $result = $usuarioModel->actualizarUsuario(
                    $id,
                    $nombre,
                    $apellido,
                    $correo,
                    $contrasenia, // Si está vacía, no se actualiza la contraseña
                    $idRol
                );
    
                if ($result) {
                    header("Location: /administrarUsuario/lista");
                    exit();
                } else {
                    throw new Exception("Error al actualizar el usuario");
                }
            } catch (Exception $e) {
                error_log("Error al actualizar usuario: " . $e->getMessage());
                $this->render('adminUser/editar.php', [
                    'error' => $e->getMessage(),
                    'usuario' => $_POST // Pasa los datos del formulario para que el usuario no los pierda
                ]);
                return;
            }
        }
        header("Location: /administrarUsuario/lista");
        exit();
    }
    public function delete($id)
    {
        if ($id) {
            $usuarioModel = new AdministrarUsuarioModel();
            $result = $usuarioModel->eliminarUsuario($id);

            if ($result) {
                header("Location: /administrarUsuario/lista");
                exit();
            }
        }
        header("Location: /administrarUsuario/lista");
    }

   public function lista()
{
    try {
        $usuarioModel = new AdministrarUsuarioModel();
        $usuarios = $usuarioModel->getAll();

        // Pasa los usuarios a la vista
        $this->render('adminUser/lista_usuarios.php', [
            'usuarios' => $usuarios
        ]);
    } catch (Exception $e) {
        error_log("Error al cargar la lista de usuarios: " . $e->getMessage());
        $this->render('adminUser/lista_usuarios.php', [
            'error' => 'Error al cargar la lista de usuarios',
            'usuarios' => []
        ]);
    }
}

}