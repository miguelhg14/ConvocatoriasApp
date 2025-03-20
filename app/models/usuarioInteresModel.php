<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class UsuarioInteresModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "usuariointereses";
    }

    // Método para asignar un interés a un usuario
    public function asignarInteres($idUsuario, $idInteres)
    {
        $sql = "INSERT INTO usuariointereses (idUsuario, idInteres) VALUES (:idUsuario, :idInteres)";

        try {
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idInteres', $idInteres, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al asignar interés: " . $e->getMessage());
            return false;
        }
    }

    // Método para obtener los intereses de un usuario
    public function obtenerInteresesPorUsuario($idUsuario)
    {
        try {
            $sql = "SELECT i.* FROM intereses i
                    INNER JOIN usuariointereses ui ON i.id = ui.idInteres
                    WHERE ui.idUsuario = :idUsuario";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error al obtener intereses del usuario: " . $e->getMessage());
            return [];
        }
    }

    // Método para eliminar un interés de un usuario
    public function eliminarInteres($idUsuario, $idInteres)
    {
        $sql = "DELETE FROM usuariointereses WHERE idUsuario = :idUsuario AND idInteres = :idInteres";

        try {
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idInteres', $idInteres, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar interés: " . $e->getMessage());
            return false;
        }
    }
}