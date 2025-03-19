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
            $id = $_POST['txtTipoUsuario'] ?? '';
            $descripcion = $_POST['txtNombre'] ?? '';
            $nombre = $_POST['txtTipoDocumento'] ?? '';
            $fechaInicio = $_POST['txtDocumento'] ?? '';
            $fechaFin = $_POST['txtFechaNacimiento'] ?? '';
            $requisitos = $_POST['txtEmail'] ?? '';
            $idInstitucion = $_POST['txtGenero'] ?? '';
            $estado = 'activo'; // Estado por defecto
            $telefono = $_POST['txtTelefono'] ?? '';
            $eps = $_POST['txtEps'] ?? '';
            $tipoSangre = $_POST['txtTipoSangre'] ?? '';
            $peso = $_POST['txtPeso'] ?? '';
            $estatura = $_POST['txtEstatura'] ?? '';
            $telefonoEmergencia = $_POST['txtTelefonoEmergencia'] ?? '';
            $password = $_POST['txtPassword'] ?? '';
            $observaciones = $_POST['txtObservaciones'] ?? '';
            $fkIdRol = 2; // Rol por defecto: Cliente
            $fkIdGrupo = null; // Opcional
            $fkIdCentroFormacion = null; // Opcional
            $fkIdTipoUserGym = 1; // Por defecto: Cliente (ID 1 en tipousuariogym)

            // Validar los datos
            $error = '';
            if (empty($tipoUsuario) || empty($nombre) || empty($tipoDocumento) || empty($documento) || empty($fechaNacimiento) || empty($email) || empty($genero) || empty($telefono) || empty($tipoSangre) || empty($peso) || empty($estatura) || empty($password)) {
                $error = "Todos los campos obligatorios deben ser completados.";
            } else {
                // Hash de la contraseña
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insertar el usuario en la base de datos
                $userModel = new UserModel();
                $result = $userModel->insertarUsuario(
                    $tipoUsuario,
                    $nombre,
                    $tipoDocumento,
                    $documento,
                    $fechaNacimiento,
                    $email,
                    $genero,
                    $estado,
                    $telefono,
                    $eps,
                    $tipoSangre,
                    $peso,
                    $estatura,
                    $telefonoEmergencia,
                    $hashedPassword,
                    $observaciones,
                    $fkIdRol,
                    $fkIdGrupo,
                    $fkIdCentroFormacion,
                    $fkIdTipoUserGym
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