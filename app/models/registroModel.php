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
        $this->table = "usuario";
    }

    public function insertarUsuario(
        string $nombre,
        string $email,
        string $contrasenia,
        string $estado,
        ?string $telefono,
        int $idRol
    ) {
        try {
            $sql = "INSERT INTO {$this->table} (
                nombre,
                email,
                contrasenia,
                telefono,
                estado,
                idRol
            ) VALUES (
                :nombre,
                :email,
                :contrasenia,
                :telefono,
                :estado,
                :idRol
            )";

            $stmt = $this->dbConnection->prepare($sql);

            $hashedPassword = password_hash($contrasenia, PASSWORD_DEFAULT);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasenia', $hashedPassword);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':idRol', $idRol);

            // Log SQL query
            
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