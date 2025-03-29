<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AdministrarConvocatoriasModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $descripcion = null,
        private ?string $objetivo = null,
        private ?string $observaciones = null,
        private ?string $fechaRevision = null,
        private ?string $fechaCierre = null,
        private ?int $fkIdEntidad = null,
        private ?string $estado = 'Activo'
    ) {
        parent::__construct();
        $this->table = "convocatorias";
    }

    public function getAllConvocatorias()
    {
        try {
            $query = "SELECT c.*, e.nombre_entidad 
                     FROM convocatoria c 
                     LEFT JOIN entidad_institucion e ON c.fkIdEntidad = e.id 
                     ORDER BY c.fechaRevision DESC";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getConvocatoriaById($id)
    {
        try {
            $query = "SELECT c.*, e.nombre_entidad 
                     FROM convocatoria c 
                     LEFT JOIN entidad_institucion e ON c.fkIdEntidad = e.id 
                     WHERE c.id = :id";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createConvocatoria($data)
    {
        try {
            $query = "INSERT INTO convocatoria (nombre, descripcion, objetivo, observaciones, 
                     fechaRevision, fechaCierre, fkIdEntidad, estado) 
                     VALUES (:nombre, :descripcion, :objetivo, :observaciones, 
                     :fechaRevision, :fechaCierre, :fkIdEntidad, :estado)";

            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateConvocatoria($id, $data)
    {
        try {
            $query = "UPDATE convocatoria SET 
                     nombre = :nombre, 
                     descripcion = :descripcion, 
                     objetivo = :objetivo, 
                     observaciones = :observaciones, 
                     fechaRevision = :fechaRevision, 
                     fechaCierre = :fechaCierre, 
                     fkIdEntidad = :fkIdEntidad, 
                     estado = :estado 
                     WHERE id = :id";

            $data['id'] = $id;
            $stmt = $this->dbConnection->prepare($query);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteConvocatoria($id)
    {
        try {
            $query = "DELETE FROM convocatoria WHERE id = :id";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
