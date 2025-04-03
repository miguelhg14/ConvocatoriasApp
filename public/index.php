<?php

require_once '../app/config/global.php';

require_once '../app/controllers/lineaController.php';
require_once '../app/controllers/entidadInstitucionController.php';
require_once '../app/controllers/homeController.php';
require_once '../app/controllers/RolController.php';
require_once '../app/controllers/centroController.php';
require_once '../app/controllers/programaController.php';
require_once '../app/controllers/loginController.php';
require_once '../app/controllers/registroController.php';
require_once '../app/controllers/convocatoriaController.php';
require_once '../app/controllers/menuController.php';
require_once '../app/controllers/administrarUsuarioController.php';
require_once '../app/controllers/usuarioInteresController.php';
require_once '../app/controllers/UserPerfilController.php';
require_once '../app/controllers/administrarUsuariosController.php';
require_once '../app/controllers/administrarConvocatoriasController.php';
require_once '../app/controllers/requisitosController.php';
require_once '../app/controllers/favoritosController.php';
require_once '../app/controllers/PublicoObjetivoController.php';
require_once '../app/controllers/RequisitoSeleccionController.php';
require_once '../app/controllers/TipoController.php';


// Acceder a lo que llege a la url
$url = $_SERVER["REQUEST_URI"];
//Echo route
$routeslist = require_once '../app/config/routes.php';

$matchedRoute = null;
foreach ($routeslist as $route => $routeConfig) {
    if(preg_match("#^$route$#", $url, $matches)){
        //Se asigna el array requerido con el Controller y Action a ejecutar
        $matchedRoute = $routeConfig;
        break;
    }
}


if($matchedRoute){
    $controllerName = $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        //Capturar los parametros que llegan por url
        $parameters = array_slice($matches, 1);
        // echo'<pre>';
        // print_r($parameters);
        // echo'</pre>';
        $controller = new $controllerName();
        //Se llama al metodo del controller correspondiente
        $controller->$actionName(...$parameters);
        exit;
    }else{
        http_response_code(404);
        echo 'La accion y/o controlador no existe en la aplicacion';
    }
}else{
    http_response_code(404);
    echo'Error 404 la pagina solicitada no existe';
}

// if (array_key_exists($route, $routeslist)) {
//     $controllerName = $routeslist[$route]['controller'];
//     $actionName = $routeslist[$route]['action'];
//     if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
//         //Declara objeto de la clase controller correspondiente
//         $controller = new $controllerName();
//         //Se llama al metodo del controller correspondiente
//         $controller->$actionName();
//     }else{
//         echo'no entra';
//     }
// }else{
//     http_response_code(404);
//     echo'Error 404 la pagina solicitada no existe';
// }

//$fruta = "pera";
//$arrayfrutas = [
//    "naranja" =>[
//        "color" => "naranja",
//        "sabor" => "asido"
//    ],
//    "pera"=>[
//        "color"=> "verde",
//        "sabor"=> "dulce"
//    ],
//   "manzana"=>[
//        "color"=> "rojo",
//        "sabor"=> "dulce"
//   ]
//];
//Si la clave existe en el array frutas
//if(array_key_exists($fruta,$arrayfrutas)) {
//    echo "<br>Color:".$arrayfrutas[$fruta]["color"];
//    echo "<br>Sabor:".$arrayfrutas[$fruta]["sabor"];
//    //Declaro objeto de la clase HomeController
//    $controller = new HomeController();
//    //
//    $controller->index();
//}else{
//    echo "la fruta no existe";
//}

?>