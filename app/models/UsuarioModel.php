<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class UsuarioModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $apellido = null,
        private ?string $correo = null,
        private ?string $contrasenia = null,
        private ?int $idRol = null,
        private ?string $fechaCreacion = null,
        private ?string $fechaActualizacion = null
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     */
    public function crearUsuario(
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia,
        int $idRol
    ): bool {
        try {
            $sql = "INSERT INTO usuarios (
                nombre,
                apellido,
                correo,
                contrasenia,
                idRol,
                fechaCreacion
            ) VALUES (
                :nombre,
                :apellido,
                :correo,
                :contrasenia,
                :idRol,
                NOW()
            )";

            $stmt = $this->dbConnection->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasenia', password_hash($contrasenia, PASSWORD_BCRYPT)); // Encriptar la contraseña
            $stmt->bindParam(':idRol', $idRol);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     */
    public function actualizarUsuario(
        int $idUsuario,
        string $nombre,
        string $apellido,
        string $correo,
        ?string $contrasenia = null,
        int $idRol
    ): bool {
        try {
            $sql = "UPDATE usuarios SET
                nombre = :nombre,
                apellido = :apellido,
                correo = :correo,
                idRol = :idRol,
                fechaActualizacion = NOW()";

            if ($contrasenia) {
                $sql .= ", contrasenia = :contrasenia";
            }

            $sql .= " WHERE id = :idUsuario";

            $stmt = $this->dbConnection->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':idRol', $idRol);
            $stmt->bindParam(':idUsuario', $idUsuario);

            if ($contrasenia) {
                $stmt->bindParam(':contrasenia', password_hash($contrasenia, PASSWORD_BCRYPT)); // Encriptar la contraseña
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar usuario: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obtiene todos los usuarios de la base de datos.
     */
    public function obtenerTodosLosUsuarios(): array
    {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->dbConnection->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener usuarios: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtiene un usuario por su ID.
     */
    public function obtenerUsuarioPorId(int $idUsuario): ?array
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :idUsuario";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener usuario por ID: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function eliminarUsuario(int $idUsuario): bool
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :idUsuario";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar usuario: " . $e->getMessage());
            return false;
        }
    }
}