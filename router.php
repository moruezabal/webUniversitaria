<?php
   
    require_once 'controllers/carreras.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'carreras';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'carreras': //Muestra Lista de todos los pagos y el formulario
            $controller = new CarrerasController;
            $controller->showCarreras();
            break;
        
        case 'ver':
            $controller = new CarrerasController;
            $controller->showCarrera($parametros[1]);
            break;

        case 'agregar':
            if ($parametros[1] = 'carrera'){
                $controller = new CarrerasController;
                $controller->addCarrera();
            }
            if ($parametros[1] = 'materia'){
                $controller = new CarrerasController;
                $controller->addMateria();
            }
        case 'materias':
            echo("<h1>Aquí van las materias</h1>");

        case 'eliminar';
        $controller = new CarrerasController;
        $controller->eraseCarrera($parametros[1]);

        default: 
            echo "404 not found";
        break;
    }


?>

