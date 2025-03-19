<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class RegistroModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $apellido = null,
        private ?string $correo = null,
        private ?string $contrasenia = null,
        private ?int $idRol = null
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }

    public function insertarUsuario(
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia,
        int $idRol
    ) {
        try {
            // Debug information

            
            $fechaCreacion = date('Y-m-d H:i:s');
            
            $sql = "INSERT INTO {$this->table} (
                nombre,
                apellido,
                correo,
                fechaCreacion,
                fechaActualizacion,
                contrasenia,
                idRol
            ) VALUES (
                :nombre,
                :apellido,
                :correo,
                :fechaCreacion,
                :fechaActualizacion,
                :contrasenia,
                :idRol
            )";

            $stmt = $this->dbConnection->prepare($sql);

            $hashedPassword = password_hash($contrasenia, PASSWORD_DEFAULT);
            error_log("Contraseña hasheada (length): " . strlen($hashedPassword));

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':fechaCreacion', $fechaCreacion);
            $stmt->bindParam(':fechaActualizacion', $fechaActualizacion);
            $stmt->bindParam(':contrasenia', $hashedPassword);
            $stmt->bindParam(':idRol', $idRol);

            // Log SQL query
            error_log("SQL Query: " . $sql);
            
            $result = $stmt->execute();
            
            if (!$result) {
                echo "Error SQL: " . implode(", ", $stmt->errorInfo()) . "\n";
                echo "Estado PDO: " . $stmt->errorCode() . "\n";
            } else {
                echo "Inserción exitosa. ID: " . $this->dbConnection->lastInsertId() . "\n";
            }
            echo "</pre>";
            
            return $result;
        } catch (PDOException $e) {
            echo "<pre>";
            echo "Excepción PDO en insertarUsuario:\n";
            echo "Mensaje: " . $e->getMessage() . "\n";
            echo "Código: " . $e->getCode() . "\n";
            echo "</pre>";
            return false;
        }
    }

    public function obtenerUsuarioPorCorreo(string $correo): ?array
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE correo = :correo";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener usuario por correo: " . $e->getMessage());
            return null;
        }
    }
}