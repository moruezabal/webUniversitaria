<?php

function getCarreras() {

    // 1. abro la conexiÃ³n con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
    
    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM carrera"); // prepara la consulta
    $sentencia->execute(); // ejecuta
    $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
    return $carreras;
    }

    function getCarrera($idCarrera){
        // 1. abro la conexiÃ³n con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
    
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT carrera.nombre AS carrera, materia.nombre, materia.profesor FROM materia INNER JOIN carrera  ON materia.id_carrera=carrera.id_carrera WHERE materia.id_carrera =". $idCarrera.""); // Sólo una tabla
        $sentencia->execute(); // ejecuta
        $carrera = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
    return $carrera;

    }


?>