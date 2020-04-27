<?php

function getCarreras() {

    // 1. abro la conexiÃ³n con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
    
    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM carrera"); // prepara la consulta
    $sentencia->execute(); // ejecuta
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
    return $tareas;
    }


?>