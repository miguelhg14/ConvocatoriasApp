<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class ConvocatoriaModel extends BaseModel
{

    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $descripcion = null,
        private ?string $fechaInicio = null,
        private ?string $fechaFin = null,
        private ?string $requisitos = null,
        private ?string $beneficios = null,
        private ?string $modalidad = null,
        private ?string $ubicacion = null,
        private ?string $enlaceInscripcion = null,
        private ?string $imagen = null,
        private ?int $idInstitucion = null,
        private ?int $idInteres = null
    ) {
        parent::__construct();
        $this->table = "convocatorias";
    }

    public function crearConvocatoria(
        string $nombre,
        string $descripcion,
        string $fechaInicio,
        string $fechaFin,
        string $requisitos,
        string $beneficios,
        string $modalidad,
        string $ubicacion,
        ?string $enlaceInscripcion = null,
        ?string $imagen = null,
        ?int $idInstitucion = null,
        ?int $idInteres = null
    ) {
        try {
            $sql = "INSERT INTO convocatorias (
                nombre, descripcion, fechaInicio, fechaFin, 
                requisitos, beneficios, modalidad, ubicacion, 
                enlaceInscripcion, imagen, idInstitucion, idInteres
            ) VALUES (
                :nombre, :descripcion, :fechaInicio, :fechaFin,
                :requisitos, :beneficios, :modalidad, :ubicacion,
                :enlaceInscripcion, NULLIF(:imagen, ''), 1, :idInteres
            )";

            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':fechaInicio', $fechaInicio);
            $stmt->bindParam(':fechaFin', $fechaFin);
            $stmt->bindParam(':requisitos', $requisitos);
            $stmt->bindParam(':beneficios', $beneficios);
            $stmt->bindParam(':modalidad', $modalidad);
            $stmt->bindParam(':ubicacion', $ubicacion);
            $stmt->bindParam(':enlaceInscripcion', $enlaceInscripcion);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':idInteres', $idInteres);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating convocatoria: " . $e->getMessage());
            return false;
        }
    }

    public function getConvocatoriaById($id) {
        try {
            $sql = "SELECT * FROM convocatorias WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting convocatoria: " . $e->getMessage());
            return false;
        }
    }

    public function updateConvocatoria(
        int $id,
        string $nombre,
        string $descripcion,
        string $fechaInicio,
        string $fechaFin,
        string $requisitos,
        string $beneficios,
        string $modalidad,
        string $ubicacion,
        ?string $enlaceInscripcion = null,
        ?string $imagen = null,
        ?int $idInteres = null
    ) {
        try {
            $sql = "UPDATE convocatorias SET 
                nombre = :nombre, 
                descripcion = :descripcion,
                fechaInicio = :fechaInicio,
                fechaFin = :fechaFin,
                requisitos = :requisitos,
                beneficios = :beneficios,
                modalidad = :modalidad,
                ubicacion = :ubicacion,
                enlaceInscripcion = :enlaceInscripcion,
                imagen = NULLIF(:imagen, ''),
                idInteres = :idInteres
                WHERE id = :id";

            $stmt = $this->dbConnection->prepare($sql);
            
            $params = [
                ':id' => $id,
                ':nombre' => $nombre,
                ':descripcion' => $descripcion,
                ':fechaInicio' => $fechaInicio,
                ':fechaFin' => $fechaFin,
                ':requisitos' => $requisitos,
                ':beneficios' => $beneficios,
                ':modalidad' => $modalidad,
                ':ubicacion' => $ubicacion,
                ':enlaceInscripcion' => $enlaceInscripcion,
                ':imagen' => $imagen,
                ':idInteres' => $idInteres
            ];

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating convocatoria: " . $e->getMessage());
            return false;
        }
    }

    public function deleteConvocatoria($id) {
        try {
            $sql = "DELETE FROM convocatorias WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting convocatoria: " . $e->getMessage());
            return false;
        }
    }
}