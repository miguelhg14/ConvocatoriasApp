<?php

namespace App\Controller;

use App\Models\AdministrarUsuariosModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/administrarUsuariosModel.php";

class AdministrarUsuariosController extends BaseController
{
    private $administrarUsuariosModel;

    public function __construct()
    {
        $this->layout = 'administrarUsuarios_layouts';
        $this->administrarUsuariosModel = new AdministrarUsuariosModel();
    }

    public function initAdministrarUsuario()
    {
        $users = $this->administrarUsuariosModel->getAllUsers();
        $this->render('administrarUsuarios/administrarUsuarios.php', [
            'users' => $users,
            'totalUsers' => count($users)
        ]);
    }
}
