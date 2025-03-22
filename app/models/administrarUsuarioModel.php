<?php

namespace App\Models;

use PDO;
use PDOException;
use Exception; 


require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AdministrarUsuarioModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $apellido = null,
        private ?string $correo = null,
        private ?string $contrasenia = null,
        private ?int $idRol = null,
        private ?string $fechaCreacion = null,
        private ?string $fechaActualizacion = null
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }

    public function crearUsuario(
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia,
        int $idRol
    ) {
        try {
            // Validar campos obligatorios
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasenia) || empty($idRol)) {
                throw new Exception("Todos los campos son obligatorios.");
            }
    
            // Validar formato del correo
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("El correo no tiene un formato válido.");
            }
    
            // Verificar si el correo ya existe
            $sqlCheck = "SELECT id FROM usuarios WHERE correo = :correo";
            $stmtCheck = $this->dbConnection->prepare($sqlCheck);
            $stmtCheck->bindParam(':correo', $correo);
            $stmtCheck->execute();
    
            if ($stmtCheck->fetch()) {
                throw new Exception("El correo ya está registrado.");
            }
    
            // Verificar si el rol existe
            $sqlCheckRol = "SELECT id FROM roles WHERE id = :idRol";
            $stmtCheckRol = $this->dbConnection->prepare($sqlCheckRol);
            $stmtCheckRol->bindParam(':idRol', $idRol);
            $stmtCheckRol->execute();
    
            if (!$stmtCheckRol->fetch()) {
                throw new Exception("El rol seleccionado no es válido.");
            }
    
            // Insertar el nuevo usuario
            $sql = "INSERT INTO usuarios (
                nombre, apellido, correo, contrasenia, idRol, fechaCreacion
            ) VALUES (
                :nombre, :apellido, :correo, :contrasenia, :idRol, NOW()
            )";
    
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
    
            // Encriptar la contraseña
            $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
            $stmt->bindParam(':contrasenia', $contraseniaHash);
    
            $stmt->bindParam(':idRol', $idRol);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                error_log("Usuario creado correctamente: $nombre $apellido"); // Depuración
                return true;
            } else {
                // Obtener detalles del error
                $errorInfo = $stmt->errorInfo();
                error_log("Error al ejecutar la consulta: " . print_r($errorInfo, true)); // Depuración
                throw new Exception("Error al crear el usuario. Por favor, inténtalo de nuevo.");
            }
        } catch (PDOException $e) {
            error_log("Error en la base de datos: " . $e->getMessage());
            throw new Exception("Error al crear el usuario. Por favor, inténtalo de nuevo.");
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            throw $e; // Relanzar la excepción para manejarla en el controlador
        }
    }

    public function getUsuarioById($id)
    {
        error_log("Buscando usuario con ID: $id"); // Depuración
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            error_log("Usuario encontrado: " . print_r($usuario, true)); // Depuración
            return $usuario;
        } catch (PDOException $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarUsuario(
        int $id,
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia,
        int $idRol
    ) {
        try {
            // Si la contraseña está vacía, no la actualizamos
            if (empty($contrasenia)) {
                $sql = "UPDATE usuarios SET 
                    nombre = :nombre, 
                    apellido = :apellido,
                    correo = :correo,
                    idRol = :idRol,
                    fechaActualizacion = NOW()
                    WHERE id = :id";
            } else {
                // Encriptar la contraseña antes de guardarla
                $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT); // Almacenar en una variable
                $sql = "UPDATE usuarios SET 
                    nombre = :nombre, 
                    apellido = :apellido,
                    correo = :correo,
                    contrasenia = :contrasenia,
                    idRol = :idRol,
                    fechaActualizacion = NOW()
                    WHERE id = :id";
            }
    
            $stmt = $this->dbConnection->prepare($sql);
    
            $params = [
                ':id' => $id,
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':idRol' => $idRol
            ];
    
            if (!empty($contrasenia)) {
                $params[':contrasenia'] = $contraseniaHash; // Usar la variable
            }
    
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarUsuario($id)
    {
        try {
            // Verificar si el usuario existe
            $sqlCheck = "SELECT id FROM usuarios WHERE id = :id";
            $stmtCheck = $this->dbConnection->prepare($sqlCheck);
            $stmtCheck->bindParam(':id', $id);
            $stmtCheck->execute();
    
            if (!$stmtCheck->fetch()) {
                throw new Exception("Usuario no encontrado");
            }
    
            // Eliminar el usuario
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM usuarios ORDER BY fechaCreacion DESC"; // Ordenar por fecha de creación
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?: []; // Devuelve un array vacío si no hay resultados
        } catch (PDOException $e) {
            error_log("Error al obtener todos los usuarios: " . $e->getMessage());
            return []; // Devuelve un array vacío en caso de error
        }
    }
}