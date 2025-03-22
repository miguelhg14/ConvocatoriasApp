<?php

namespace App\Controller;

use Exception;
use App\Models\UserPerfilModel; // Cambiado a UserPerfilModel
use App\Models\RolModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/UserPerfilModel.php"; // Cambiado a UserPerfilModel
require_once MAIN_APP_ROUTE . "../models/rolModel.php";

class PerfilUserController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'user_layout';
    }

    public function initUser()
    {
        try {
            // Get roles for dropdown
            $rolModel = new RolModel();
            $roles = $rolModel->getAll();
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get and trim all form data
                $nombre = trim($_POST['nombre'] ?? '');
                $apellido = trim($_POST['apellido'] ?? '');
                $correo = trim($_POST['correo'] ?? '');
                $contrasenia = trim($_POST['contrasenia'] ?? '');
                $idRol = !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null;
    
                // Validate required fields
                if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasenia) || empty($idRol)) {
                    $error = "Los campos obligatorios no pueden estar vacíos";
                    $this->render("users/create.php", [
                        "error" => $error,
                        "roles" => $roles
                    ]);
                    return; // Add this to prevent further execution
                }
    
                try {
                    $userPerfilModel = new UserPerfilModel(); // Cambiado a UserPerfilModel
                    $result = $userPerfilModel->crearUsuario(
                        $nombre,
                        $apellido,
                        $correo,
                        $contrasenia,
                        $idRol
                    );
    
                    if ($result) {
                        header("Location: /user/lista");
                        exit();
                    } else {
                        $error = "Error al crear el usuario";
                        $this->render("users/create.php", ["error" => $error]);
                    }
                } catch (Exception $e) {
                    error_log("Error al crear usuario: " . $e->getMessage());
                    $error = "Error al procesar la solicitud";
                    $this->render("users/create.php", ["error" => $error]);
                }
            } else {
                // Display the form
                $this->render('users/create.php', [
                    'roles' => $roles
                ]);
            }
        } catch (Exception $e) {
            error_log("Error loading roles: " . $e->getMessage());
            $this->render('users/create.php', [
                'error' => 'Error al cargar los roles',
                'roles' => []
            ]);
        }
    }

    public function edit($id) {
        try {
            $userPerfilModel = new UserPerfilModel(); // Cambiado a UserPerfilModel
            $rolModel = new RolModel();

            $user = $userPerfilModel->getUserById($id); // Cambiado a UserPerfilModel
            $roles = $rolModel->getAll();

            if (!$user) {
                header("Location: /user/lista");
                exit();
            }

            $this->render('users/edit.php', [
                'user' => $user,
                'roles' => $roles
            ]);
        } catch (Exception $e) {
            error_log("Error in edit: " . $e->getMessage());
            header("Location: /user/lista");
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
                    'apellido' => trim($_POST['apellido'] ?? ''),
                    'correo' => trim($_POST['correo'] ?? ''),
                    'contrasenia' => trim($_POST['contrasenia'] ?? ''),
                    'idRol' => !empty($_POST['idRol']) ? (int)$_POST['idRol'] : null,
                ];

                // Validate required fields based on database schema
                if (empty($data['nombre']) || empty($data['apellido']) || 
                    empty($data['correo']) || empty($data['contrasenia']) || 
                    empty($data['idRol'])) {
                    throw new Exception("Faltan campos requeridos");
                }

                $userPerfilModel = new UserPerfilModel(); // Cambiado a UserPerfilModel
                $result = $userPerfilModel->updateUser(
                    $id,
                    $data['nombre'],
                    $data['apellido'],
                    $data['correo'],
                    $data['contrasenia'],
                    $data['idRol']
                );

                if ($result) {
                    header("Location: /user/lista");
                    exit();
                } else {
                    throw new Exception("Error al actualizar el usuario");
                }
            } catch (Exception $e) {
                error_log("Error en actualización: " . $e->getMessage());
                
                // Get roles for the form
                $rolModel = new RolModel();
                $roles = $rolModel->getAll();
                
                $this->render('users/edit.php', [
                    'error' => $e->getMessage(),
                    'user' => $_POST,
                    'roles' => $roles
                ]);
                return;
            }
        }
        header("Location: /user/lista");
        exit();
    }

    public function delete($id) {
        if ($id) {
            $userPerfilModel = new UserPerfilModel(); // Cambiado a UserPerfilModel
            $result = $userPerfilModel->deleteUser($id); // Cambiado a UserPerfilModel
            
            if ($result) {
                header("Location: /user/lista");
                exit();
            }
        }
        header("Location: /user/lista");
    }

    public function lista() {
        try {
            $userPerfilModel = new UserPerfilModel(); // Cambiado a UserPerfilModel
            $users = $userPerfilModel->getAll(); // Cambiado a UserPerfilModel
            
            $this->render('users/lista.php', [
                'users' => $users
            ]);
        } catch (Exception $e) {
            error_log("Error loading users: " . $e->getMessage());
            $this->render('users/lista.php', [
                'error' => 'Error al cargar los usuarios',
                'users' => []
            ]);
        }
    }
}