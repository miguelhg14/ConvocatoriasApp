<?php

namespace App\Controller;

session_start();

class BaseController
{
    protected string $layout = "main_layout";
    public function __construct()
    {
        /* Validar que el tiempo de inactividad del usuario no supere el tiempo
           definido en la variable global INACTIVE_TIME */
        if (isset($_SESSION['timeout'])) {
            // Calcula el tiempo de vida de la sesion
            $tiempoSesion = time() - $_SESSION['timeout'];
            if ($tiempoSesion > (INACTIVE_TIME * 60)) {
                session_destroy();
                header("Location:/login/logout");
            } else {
                $_SESSION['timeout'] = time();
            }
        }
    }
    
    public function render($view, $data = null)
    {

        if ($data != null && is_array($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        $content = MAIN_APP_ROUTE . "../views/".$view;
        $layout = MAIN_APP_ROUTE . "../views/layouts/{$this->layout}.php";

        include_once $layout;
        //require_once MAIN_APP_ROUTE."../views/".$view;
    }
    public function formatCurrency($amount)
    {
        return '$' . number_format($amount, 2);
    }
    public function redirectTo($url)
    {
        header('Location:' . $url);
        exit;
    }
}
