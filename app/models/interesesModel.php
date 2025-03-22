<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class InteresesModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null
    ) {
        parent::__construct();
        $this->table = "intereses";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre) VALUES (:nombre)");
            $sql->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            return $sql->execute();
        } catch (PDOException $ex) {
            error_log("Error saving interest: " . $ex->getMessage());
            return false;
        }
    }

    // Remove the getAll() method since we'll use the one from BaseModel
    
    public function getInteres()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            error_log("Error getting interest: " . $ex->getMessage());
            return [];
        }
    }

    public function editInteres()
    {
        try {
            $sql = "UPDATE $this->table SET nombre = :nombre WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            error_log("Error updating interest: " . $ex->getMessage());
            return false;
        }
    }

    public function deleteInteres()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            error_log("Error deleting interest: " . $ex->getMessage());
            return false;
        }
    }
}