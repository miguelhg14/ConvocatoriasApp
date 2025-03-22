<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class UserPerfilModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $apellido = null,
        private ?string $correo = null,
        private ?string $fechaCreacion = null,
        private ?string $fechaActualizacion = null,
        private ?string $contrasenia = null,
        private ?int $idRol = null
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
            $sql = "INSERT INTO usuarios (
                nombre, apellido, correo, contrasenia, idRol
            ) VALUES (
                :nombre, :apellido, :correo, :contrasenia, :idRol
            )";

            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasenia', $contrasenia);
            $stmt->bindParam(':idRol', $idRol);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating user: " . $e->getMessage());
            return false;
        }
    }

    public function getUserById($id) {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting user: " . $e->getMessage());
            return false;
        }
    }

    public function updateUser(
        int $id,
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia,
        int $idRol
    ) {
        try {
            $sql = "UPDATE usuarios SET 
                nombre = :nombre, 
                apellido = :apellido,
                correo = :correo,
                contrasenia = :contrasenia,
                idRol = :idRol
                WHERE id = :id";

            $stmt = $this->dbConnection->prepare($sql);
            
            $params = [
                ':id' => $id,
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':contrasenia' => $contrasenia,
                ':idRol' => $idRol
            ];

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }

    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al borrar el usuario: " . $e->getMessage());
            return false;
        }
    }

   
    
}