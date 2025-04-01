<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AdministrarUsuariosModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "usuario";
    }

    public function getAllUsers()
    {
        try {
            $sql = "SELECT id, nombre, email, estado, idRol FROM {$this->table}";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting users: " . $e->getMessage());
            return [];
        }
    }
}