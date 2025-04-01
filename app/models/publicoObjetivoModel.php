<?php

namespace App\Models;

use Exception;

class PublicoObjetivoModel extends BaseModel
{
    private $id;
    private $nombre;

    public function __construct($id = null, $nombre = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getAll(): array
    {
        try {
            $query = "SELECT * FROM `publicoObjetivo`";
            $statement = $this->dbConnection->query($query);
            $result = $statement->fetchAll(\PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoModel->getAll: " . $e->getMessage());
            return [];
        }
    }

    public function save()
    {
        try {
            $query = "INSERT INTO publicoObjetivo (nombre) VALUES (?)";
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute([$this->nombre]);
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoModel->save: " . $e->getMessage());
            return false;
        }
    }

    public function getPublicoObjetivo()
    {
        try {
            $query = "SELECT * FROM publicoObjetivo WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoModel->getPublicoObjetivo: " . $e->getMessage());
            return [];
        }
    }

    public function editPublicoObjetivo()
    {
        try {
            $query = "UPDATE publicoObjetivo SET nombre = ? WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute([$this->nombre, $this->id]);
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoModel->editPublicoObjetivo: " . $e->getMessage());
            return false;
        }
    }

    public function deletePublicoObjetivo()
    {
        try {
            $query = "DELETE FROM publicoObjetivo WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute([$this->id]);
        } catch (Exception $e) {
            error_log("Error in PublicoObjetivoModel->deletePublicoObjetivo: " . $e->getMessage());
            return false;
        }
    }
}