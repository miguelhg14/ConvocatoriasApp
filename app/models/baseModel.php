<?php
namespace App\Models;
use PDO;
use PDOException;

abstract class BaseModel
{
    protected $dbConnection;
    protected $table;

    public function __construct()
    {
        // Se genera la coneccion a la base de datos
        $dbConfig = require_once MAIN_APP_ROUTE . "../config/database.php";
        try {

            // $dns = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
            $dns = DRIVER . ":host=" . HOST . ";dbname=" . DATABASE;
            // $this->dbConnection = new PDO($dns, $dbConfig['username'], $dbConfig['password']);
            $this->dbConnection = new PDO($dns, USERNAME, PASSWORD);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
    public function getAll(): array
    {
        try {
            if (!$this->table) {
                error_log("Table name not set in " . get_class($this));
                return [];
            }

            $sql = "SELECT * FROM {$this->table}";
            $statement = $this->dbConnection->query($sql);
            
            if ($statement === false) {
                error_log("Query failed: " . implode(", ", $this->dbConnection->errorInfo()));
                return [];
            }

            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result ?: [];
            
        } catch (PDOException $ex) {
            error_log("Database error in getAll: " . $ex->getMessage());
            return [];
        }
    }
}
