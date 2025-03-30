<?php

namespace App\Models;

use Exception;

class RequisitosModel extends BaseModel
{
    private $id;
    private $nombre;
    private $observaciones;
    private $idEntidad;
    private $idRequisitoSeleccion;

    public function __construct($id = null, $nombre = null, $observaciones = null, $idEntidad = null, $idRequisitoSeleccion = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->observaciones = $observaciones;
        $this->idEntidad = $idEntidad;
        $this->idRequisitoSeleccion = $idRequisitoSeleccion;
    }

    public function getAll(): array
    {
        try {
            $query = "SELECT * FROM `Requisitos`";
            $statement = $this->dbConnection->query($query);
            $result = $statement->fetchAll(\PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            error_log("Error in RequisitosModel->getAll: " . $e->getMessage());
            return [];
        }
    }

    public function save()
    {
        try {
            $query = "INSERT INTO requisitos (nombre, obervaciones, idEntidad, idRequisitoSeleccion) 
                     VALUES (?, ?, ?, ?)";
            
            $stmt = $this->dbConnection->prepare($query);
            
            // Depurar valores antes de insertar
            error_log("Intentando insertar: " . json_encode([
                'nombre' => $this->nombre,
                'obervaciones' => $this->observaciones,
                'idEntidad' => $this->idEntidad,
                'idRequisitoSeleccion' => $this->idRequisitoSeleccion
            ]));
            
            $result = $stmt->execute([
                $this->nombre,
                $this->observaciones,
                $this->idEntidad,
                $this->idRequisitoSeleccion
            ]);

            if (!$result) {
                error_log("Error SQL: " . print_r($stmt->errorInfo(), true));
                return false;
            }
            
            return true;
        } catch (Exception $e) {
            error_log("Error en save: " . $e->getMessage());
            return false;
        }
    }

    public function getRequisitos()
    {
        try {
            $query = "SELECT * FROM Requisitos WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in RequisitosModel->getRequisitos: " . $e->getMessage());
            return [];
        }
    }

    public function editRequisitos()
    {
        try {
            $query = "UPDATE requisitos SET nombre = ?, obervaciones = ?, idEntidad = ?, idRequisitoSeleccion = ? WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute([
                $this->nombre,
                $this->observaciones,
                $this->idEntidad,
                $this->idRequisitoSeleccion,
                $this->id
            ]);
        } catch (Exception $e) {
            error_log("Error in RequisitosModel->editRequisitos: " . $e->getMessage());
            return false;
        }
    }

    public function deleteRequisitos()
    {
        try {
            $query = "DELETE FROM Requisitos WHERE id = ?";
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute([$this->id]);
        } catch (Exception $e) {
            error_log("Error in RequisitosModel->deleteRequisitos: " . $e->getMessage());
            return false;
        }
    }
}