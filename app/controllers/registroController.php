<?php

namespace App\Controller;

use App\Models\UserModel;
use Core\Controller;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/UserModel.php";

class RegistroController extends BaseController
{
    public function __construct()
    {
        // Definir el layout para el controlador específico
        $this->layout = 'registro_layout';
        parent::__construct(); // Llama al constructor del padre (BaseController)
    }

    public function initRegistro()
    {
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener y limpiar los datos del formulario
            $nombre = $_POST['txtNombre'] ?? '';
            $apellido = $_POST['txtApellido'] ?? '';
            $correo = $_POST['txtCorreo'] ?? '';
            $contraseña = $_POST['txtContraseña'] ?? '';
            $idRol = $_POST['txtRol'] ?? '';


            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña) || empty($idRol)) {
                $error = "Todos los campos obligatorios deben ser completados.";
            } else {
                // Hash de la contraseña
                $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);

                // Insertar el usuario en la base de datos
                $userModel = new UserModel();
                $result = $userModel->insertarUsuario(
                    $nombre,
                    $apellido,
                    $correo,
                    $hashedPassword,
                    $idRol
                );

                if ($result) {
                    // Redirigir al usuario a la página de inicio de sesión
                    header("Location: /login/init");
                    exit();
                } else {
                    $error = "Error al registrar el usuario. Inténtelo de nuevo.";
                }
            }

            // Si hay un error, mostrar el formulario con el mensaje de error
            $data = [
                "error" => $error
            ];
            $this->render("registro/registro.php", $data);
        } else {
            // Si no es una solicitud POST, mostrar el formulario de registro
            $this->render("registro/registro.php");
        }
    }
}
