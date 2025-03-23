<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AdministrarUsuariosModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
    ) {
        //Se llama al constructor del padre
        parent::__construct();
        //Se especifica la tabla
        $this->table = "roles";
    }
}