<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class UserPerfilModel extends BaseModel
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
        private ?string $fkidRol = null,
        private ?string $fkidGrupo = null,
        private ?string $fkidCentroForm = null,
        private ?string $fkidTipoUserGym = null,
    ) {
        parent::__construct();
        $this->table = "usuario";
    }
}