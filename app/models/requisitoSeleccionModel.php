<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class RequisitoSeleccionModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?int $idTipo = null,
    ) {
        parent::__construct();
        $this->table = "requisito-seleccion";
    }

    public function save()
    {
        try {
            // Debug para ver los valores que intentamos guardar
            error_log("Intentando guardar - Nombre: {$this->nombre}, idTipo: {$this->idTipo}");
            
            $sql = $this->dbConnection->prepare("INSERT INTO `requisito-seleccion` (nombre, idTipo) VALUES (?,?)");
            
            // Asegurarnos que idTipo sea un entero
            $idTipo = (int)$this->idTipo;
            
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(2, $idTipo, PDO::PARAM_INT);
            
            $res = $sql->execute();
            
            if (!$res) {
                // Obtener información detallada del error
                $errorInfo = $sql->errorInfo();
                error_log("Error SQL: " . print_r($errorInfo, true));
            }
            
            return $res;
        } catch (PDOException $ex) {
            error_log("Error en save(): " . $ex->getMessage());
            error_log("Stack trace: " . $ex->getTraceAsString());
            return false;
        }
    }

    public function getRequisitoSeleccion()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el requisito de selección> " . $ex->getMessage();
        }
    }

    public function editRequisitoSeleccion()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, idTipo=:idTipo WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":idTipo", $this->idTipo, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteRequisitoSeleccion()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser eliminado " . $ex->getMessage();
        }
    }


        public function getAll(): array
        {
            try {
                $sql = "SELECT * FROM $this->table";
                $statement = $this->dbConnection->prepare($sql);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                error_log("Error getting all requisitos: " . $ex->getMessage());
                return [];
            }
        }
    

    public function getAllWithTipoName()
    {
        try {
            $sql = "SELECT rs.*, t.nombre as nombre_tipo 
                    FROM `requisito-seleccion` rs 
                    LEFT JOIN tipo t ON rs.idTipo = t.id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            error_log("Error getting requisitos with tipo: " . $ex->getMessage());
            return [];
        }
    }
}