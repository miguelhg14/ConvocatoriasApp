<?php
return [
    // Rutas principales
    '/' => [
        'controller' => 'App\Controller\HomeController',
        'action' => 'index',
    ],
    '/home' => [
        'controller' => 'App\Controller\HomeController',
        'action' => 'index',
    ],
    '/saludo' => [
        'controller' => 'App\Controller\HomeController',
        'action' => 'saludar',
    ],
    


    // Rutas para Rol
    '/rol/index' => ['controller' => 'App\Controller\RolController', 'action' => 'index'],
    '/rol/new' => ['controller' => 'App\Controller\RolController', 'action' => 'new'],
    '/rol/create' => ['controller' => 'App\Controller\RolController', 'action' => 'create'],
    '/rol/view/(\d+)' => ['controller' => 'App\Controller\RolController', 'action' => 'view'],
    '/rol/edit/(\d+)' => ['controller' => 'App\Controller\RolController', 'action' => 'editRol'],
    '/rol/update' => ['controller' => 'App\Controller\RolController', 'action' => 'updateRol'],
    '/rol/delete/(\d+)' => ['controller' => 'App\Controller\RolController', 'action' => 'deleteRol'],

    // Rutas para Actividad
    '/actividad/index' => ['controller' => 'App\Controller\ActividadController', 'action' => 'index'],
    '/actividad/new' => ['controller' => 'App\Controller\ActividadController', 'action' => 'new'],
    '/actividad/create' => ['controller' => 'App\Controller\ActividadController', 'action' => 'create'],
    '/actividad/view/(\d+)' => ['controller' => 'App\Controller\ActividadController', 'action' => 'view'],
    '/actividad/edit/(\d+)' => ['controller' => 'App\Controller\ActividadController', 'action' => 'editActividad'],
    '/actividad/update' => ['controller' => 'App\Controller\ActividadController', 'action' => 'updateActividad'],
    '/actividad/delete/(\d+)' => ['controller' => 'App\Controller\ActividadController', 'action' => 'deleteActividad'],

    // Rutas para Centro
    '/centro/index' => ['controller' => 'App\Controller\CentroController', 'action' => 'index'],
    '/centro/new' => ['controller' => 'App\Controller\CentroController', 'action' => 'new'],
    '/centro/create' => ['controller' => 'App\Controller\CentroController', 'action' => 'create'],
    '/centro/view/(\d+)' => ['controller' => 'App\Controller\CentroController', 'action' => 'view'],
    '/centro/edit/(\d+)' => ['controller' => 'App\Controller\CentroController', 'action' => 'editCentro'],
    '/centro/update' => ['controller' => 'App\Controller\CentroController', 'action' => 'updateCentro'],
    '/centro/delete/(\d+)' => ['controller' => 'App\Controller\CentroController', 'action' => 'deleteCentro'],

    // Rutas para Programa
    '/programa/index' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'index'],
    '/programa/new' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'new'],
    '/programa/create' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'create'],
    '/programa/view/(\d+)' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'view'],
    '/programa/edit/(\d+)' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'editPrograma'],
    '/programa/update' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'updatePrograma'],
    '/programa/delete/(\d+)' => ['controller' => 'App\Controller\ProgramaController', 'action' => 'deletePrograma'],

    // Rutas de usuario
    '/user/new' => ['controller' => 'App\Controller\LoginController', 'action' => 'new'],
    '/user/view/(\d+)' => ['controller' => 'App\Controller\LoginController', 'action' => 'view'],
    '/user/create' => ['controller' => 'App\Controller\LoginController', 'action' => 'create'],

    // Rutas de login
    '/login/init' => ['controller' => 'App\Controller\LoginController', 'action' => 'initLogin'],
    '/registro/initRegistro' => ['controller' => 'App\Controller\RegistroController', 'action' => 'initRegistro'],

    // Otras rutas de funciones de las tablas
    '/convocatoria/init' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'initConvocatoria'],
    // '/userPerfil/init' => ['controller' => 'App\Controller\UserPerfilController', 'action' => 'initUserPerfil'],
   
    // Otras rutas de funciones de las tablas
'/convocatoria/init' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'initConvocatoria'],
'/perfilUser/init' => ['controller' => 'App\Controller\PerfilUserController', 'action' => 'initUserPerfil'],
'/administrarUsuario/init' => ['controller' => 'App\Controller\AdministrarUsuarioController', 'action' => 'initAdministrarUsuario'],


     // Otras rutas
     '/menu/init' => ['controller' => 'App\Controller\MenuController', 'action' => 'initMenu'], 
];

