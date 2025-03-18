<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class RegistroModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $tipoDoc = null,
        private ?string $documento = null,
        private ?DateTime $fechaNac = null,
        private ?string $email = null,
        private ?string $genero = null,
        private ?string $estado = null,
        private ?string $telefono = null,
        private ?string $eps = null,
        private ?string $tipoSangre = null,
        private ?float $peso = null,
        private ?float $estatura = null,
        private ?string $telefonoEmer = null,
        private ?string $password = null,
        private ?string $observaciones = null,
        private ?int $fkidRol = null,
        private ?int $fkidGrupo = null,
        private ?int $fkidCentroForm = null,
        private ?int $fkidTipoUserGym = null
    ) {
        parent::__construct();
        $this->table = "usuario"; // Nombre de la tabla en la base de datos
    }

    /**
     * Inserta un nuevo usuario en la base de datos.
     *
     * @param array $datosUsuario Datos del usuario a insertar.
     * @return bool Retorna true si la inserción fue exitosa, false en caso contrario.
     */
    public function insertarUsuario(array $datosUsuario): bool
    {
        try {
            // Hash de la contraseña
            $hashedPassword = password_hash($datosUsuario['password'], PASSWORD_DEFAULT);

            // Query para insertar un nuevo usuario
            $sql = "INSERT INTO {$this->table} (
                nombre, tipoDocumento, documento, fechaNacimiento, email, genero, estado, telefono, eps, tipoSangre, peso, estatura, telefonoEmergencia, password, observaciones, fkIdRol, fkIdGrupo, fkIdCentroFormacion, fkIdTipoUserGym
            ) VALUES (
                :nombre, :tipoDocumento, :documento, :fechaNacimiento, :email, :genero, :estado, :telefono, :eps, :tipoSangre, :peso, :estatura, :telefonoEmergencia, :password, :observaciones, :fkIdRol, :fkIdGrupo, :fkIdCentroFormacion, :fkIdTipoUserGym
            )";

            // Prepara la consulta
            $stmt = $this->dbConnection->prepare($sql);

            // Vincula los parámetros
            $stmt->bindParam(':nombre', $datosUsuario['nombre']);
            $stmt->bindParam(':tipoDocumento', $datosUsuario['tipoDoc']);
            $stmt->bindParam(':documento', $datosUsuario['documento']);
            $stmt->bindParam(':fechaNacimiento', $datosUsuario['fechaNac']?->format('Y-m-d'));
            $stmt->bindParam(':email', $datosUsuario['email']);
            $stmt->bindParam(':genero', $datosUsuario['genero']);
            $stmt->bindParam(':estado', $datosUsuario['estado']);
            $stmt->bindParam(':telefono', $datosUsuario['telefono']);
            $stmt->bindParam(':eps', $datosUsuario['eps']);
            $stmt->bindParam(':tipoSangre', $datosUsuario['tipoSangre']);
            $stmt->bindParam(':peso', $datosUsuario['peso']);
            $stmt->bindParam(':estatura', $datosUsuario['estatura']);
            $stmt->bindParam(':telefonoEmergencia', $datosUsuario['telefonoEmer']);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':observaciones', $datosUsuario['observaciones']);
            $stmt->bindParam(':fkIdRol', $datosUsuario['fkidRol']);
            $stmt->bindParam(':fkIdGrupo', $datosUsuario['fkidGrupo']);
            $stmt->bindParam(':fkIdCentroFormacion', $datosUsuario['fkidCentroForm']);
            $stmt->bindParam(':fkIdTipoUserGym', $datosUsuario['fkidTipoUserGym']);

            // Ejecuta la consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al insertar usuario: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obtiene un usuario por su documento.
     *
     * @param string $documento El documento del usuario.
     * @return array|null Retorna los datos del usuario o null si no se encuentra.
     */
    public function obtenerUsuarioPorDocumento(string $documento): ?array
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE documento = :documento";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':documento', $documento);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Error al obtener usuario por documento: " . $e->getMessage());
            return null;
        }
    }
}