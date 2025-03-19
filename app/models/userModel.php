<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class UserModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $apellido = null,
        private ?string $correo = null,
        private ?string $fechaCreacion = null,
        private ?string $fechaActualizacion = null,
        private ?string $contraseña = null,
        private ?int $idRol = null
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }

    public function validarLogin($correo, $contraseña)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':correo', $correo, PDO::PARAM_STR);
            $statement->execute();
            $resultSet = [];
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            if (count($resultSet) > 0) {
                $hashed = $resultSet[0]->contraseña;
                if (password_verify($contraseña, $hashed)) {
                    $_SESSION['rol'] = $resultSet[0]->idRol;
                    $_SESSION['nombre'] = $resultSet[0]->nombre;
                    $_SESSION['id'] = $resultSet[0]->id;
                    $_SESSION['timeout'] = time();
                    session_regenerate_id();
                    return true;
                }
            }
            return false;
        } catch (PDOException $ex) {
            echo "Error validando login: " . $ex->getMessage();
            return false;
        }
    }

    public function getAllUsuarios()
    {
        try {
            $sql = "SELECT u.*, r.nombre as rol_nombre 
                    FROM usuarios u 
                    LEFT JOIN roles r ON u.idRol = r.id";
            $statement = $this->dbConnection->query($sql);
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener usuarios: " . $ex->getMessage();
            return [];
        }
    }

public function insertarUsuario($nombre, $apellido, $correo, $contrasenia, $idRol)
{
    $fechaCreacion = date("Y-m-d H:i:s"); // Fecha actual
    $fechaActualizacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, fechaCreacion, fechaActualizacion, contrasenia, idRol)
            VALUES (:nombre, :apellido, :correo, :fechaCreacion, :fechaActualizacion, :contrasenia, :idRol)";

    $stmt = $this->dbConnection->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':fechaCreacion', $fechaCreacion);
    $stmt->bindParam(':fechaActualizacion', $fechaActualizacion);
    $stmt->bindParam(':contrasenia', $contrasenia); // Ahora coincide con la base de datos
    $stmt->bindParam(':idRol', $idRol);

    try {
        return $stmt->execute(); // Ejecutar la consulta
    } catch (PDOException $e) {
        echo "Error al insertar usuario: " . $e->getMessage();
        return false;
    }
}


    public function editUsuario($id, $nombre, $apellido, $correo, $idRol)
    {
        try {
            $fechaActualizacion = date('Y-m-d H:i:s');
            
            $sql = "UPDATE usuarios SET 
                    nombre = :nombre,
                    apellido = :apellido,
                    correo = :correo,
                    fechaActualizacion = :fechaActualizacion,
                    idRol = :idRol
                    WHERE id = :id";

            $stmt = $this->dbConnection->prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':fechaActualizacion', $fechaActualizacion, PDO::PARAM_STR);
            $stmt->bindParam(':idRol', $idRol, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "Error al actualizar usuario: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteUsuario($id)
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "Error al eliminar usuario: " . $ex->getMessage();
            return false;
        }
    }

    public function getOneUsuario($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener usuario: " . $ex->getMessage();
            return null;
        }
    }
}
