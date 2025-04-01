<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class RolModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
    ) {
        parent::__construct();
        $this->table = "rol";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre) VALUES (?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getRol()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el rol> " . $ex->getMessage();
        }
    }

    public function editRol()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El no pudo ser editado " . $ex->getMessage();
        }
    }

    public function deleteRol()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El no pudo ser Eliminado " . $ex->getMessage();
        }
    }

    // Método para obtener todos los roles
    public function obtenerRoles()
    {
        try {
            $sql = "SELECT * FROM rol";
            $stmt = $this->dbConnection->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ); // Devuelve un array de objetos
        } catch (PDOException $e) {
            error_log("Error al obtener roles: " . $e->getMessage());
            return []; // Devuelve un array vacío en caso de error
        }
    }

    // Método para crear un rol
    public function crearRol($nombre)
    {
        $sql = "INSERT INTO rol (nombre) VALUES (:nombre)";

        try {
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al crear rol: " . $e->getMessage());
            return false;
        }
    }

    // Método para obtener un rol por su ID
    public function obtenerRolPorId($id)
    {
        try {
            $sql = "SELECT * FROM rol WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error al obtener rol: " . $e->getMessage());
            return null;
        }
    }
}