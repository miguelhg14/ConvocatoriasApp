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
    '/registro/init' => ['controller' => 'App\Controller\RegistroController', 'action' => 'initRegistro'],

    // Otras rutas de funciones de las tablas
    '/convocatoria/init' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'initConvocatoria'],
    '/convocatoria/edit/(\d+)' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'edit'],
    '/convocatoria/update/(\d+)' => ['controller' => 'App\Controller\ConvocatoriaController','action' => 'update'],
    '/convocatoria/delete/(\d+)' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'delete'],
    '/convocatoria/lista' => ['controller' => 'App\Controller\ConvocatoriaController', 'action' => 'lista'],
    
    '/userPerfil/init' => ['controller' => 'App\Controller\UserPerfilController', 'action' => 'initUserPerfil'],
    '/requisitos/init' => ['controller' => 'App\Controller\requisitosController', 'action' => 'initRequisitos'],

     // Otras rutas
    '/menu/init' => ['controller' => 'App\Controller\MenuController', 'action' => 'initMenu'], 
    '/favoritos/init' => ['controller' => 'App\Controller\FavoritosController', 'action' => 'initFavoritos'], 


     // Otras rutas
     '/administrarUsuario/init' => ['controller' => 'App\Controller\AdministrarUsuariosController', 'action' => 'initAdministrarUsuario'], 

    // Otras rutas
    '/administrarConvocatorias/init' => ['controller' => 'App\Controller\administrarConvocatoriasController', 'action' => 'initadministrarConvocatorias'], 


    // Otras rutas
    '/linea/init' => ['controller' => 'App\Controller\LineaController', 'action' => 'initlinea'],
    '/linea/new' => ['controller' => 'App\Controller\LineaController', 'action' => 'new'],
    '/linea/create' => ['controller' => 'App\Controller\LineaController', 'action' => 'create'],
    '/linea/view/(\d+)' => ['controller' => 'App\Controller\LineaController', 'action' => 'view'],
    '/linea/edit/(\d+)' => ['controller' => 'App\Controller\LineaController', 'action' => 'editLinea'],
    '/linea/update/(\d+)' => ['controller' => 'App\Controller\LineaController','action' => 'updateLinea'],
    '/linea/delete/(\d+)' => ['controller' => 'App\Controller\LineaController', 'action' => 'deleteLinea'],

    // Otras rutas
    '/entidadInstitucion/init' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'initEntidadinstitucion'],
    '/entidadInstitucion/new' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'new'],
    '/entidadInstitucion/create' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'create'],
    '/entidadInstitucion/view/(\d+)' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'view'],
    '/entidadInstitucion/edit/(\d+)' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'editEntidadinstitucion'],
    '/entidadInstitucion/update/(\d+)' => ['controller' => 'App\Controller\EntidadInstitucionController','action' => 'updateEntidadinstitucion'],
    '/entidadInstitucion/delete/(\d+)' => ['controller' => 'App\Controller\EntidadInstitucionController', 'action' => 'deleteEntidadinstitucion'],

    
    // Rutas para PublicoObjetivo
    '/publicoObjetivo/init' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'initPublicoObjetivo'],
    '/publicoObjetivo/new' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'new'],
    '/publicoObjetivo/create' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'create'],
    '/publicoObjetivo/view/(\d+)' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'view'],
    '/publicoObjetivo/edit/(\d+)' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'editPublicoObjetivo'],
    '/publicoObjetivo/update/(\d+)' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'updatePublicoObjetivo'],
    '/publicoObjetivo/delete/(\d+)' => ['controller' => 'App\Controller\PublicoObjetivoController', 'action' => 'deletePublicoObjetivo'],

    // Rutas para Requisitos
    '/requisitos/init' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'initRequisitos'],
    '/requisitos/new' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'new'],
    '/requisitos/create' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'create'],
    '/requisitos/view/(\d+)' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'view'],
    '/requisitos/edit/(\d+)' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'editRequisitos'],
    '/requisitos/update/(\d+)' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'updateRequisitos'],
    '/requisitos/delete/(\d+)' => ['controller' => 'App\Controller\RequisitosController', 'action' => 'deleteRequisitos'],

        // Rutas para RequisitoSeleccion
        '/requisitoSeleccion/init' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'initRequisitoSeleccion'],
        '/requisitoSeleccion/new' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'new'],
        '/requisitoSeleccion/create' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'create'],
        '/requisitoSeleccion/view/(\d+)' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'view'],
        '/requisitoSeleccion/edit/(\d+)' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'editRequisitoSeleccion'],
        '/requisitoSeleccion/update/(\d+)' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'updateRequisitoSeleccion'],
        '/requisitoSeleccion/delete/(\d+)' => ['controller' => 'App\Controller\RequisitoSeleccionController', 'action' => 'deleteRequisitoSeleccion'],

            // Rutas para Tipo
    '/tipo/init' => ['controller' => 'App\Controller\TipoController', 'action' => 'initTipo'],
    '/tipo/new' => ['controller' => 'App\Controller\TipoController', 'action' => 'new'],
    '/tipo/create' => ['controller' => 'App\Controller\TipoController', 'action' => 'create'],
    '/tipo/view/(\d+)' => ['controller' => 'App\Controller\TipoController', 'action' => 'view'],
    '/tipo/edit/(\d+)' => ['controller' => 'App\Controller\TipoController', 'action' => 'editTipo'],
    '/tipo/update/(\d+)' => ['controller' => 'App\Controller\TipoController', 'action' => 'updateTipo'],
    '/tipo/delete/(\d+)' => ['controller' => 'App\Controller\TipoController', 'action' => 'deleteTipo'],
];

