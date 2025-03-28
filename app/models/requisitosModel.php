<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class requisitosModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $email = null,

        private ?string $contraseña = null,
        private ?int $idRol = null
    ) {
        parent::__construct();
        $this->table = "requisitos";
    }
}