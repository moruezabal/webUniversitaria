<?php

class CarrerasModel{

    public function getAll() {

        // 1. abro la conexiÃ³n con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
        
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM carrera"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
        return $carreras;   
    }

    public function getCarrera($idCarrera){
        // 1. abro la conexiÃ³n con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
    
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT car.nombre AS carrera, mat.nombre, mat.profesor FROM materia mat INNER JOIN carrera car  ON mat.id_carrera=car.id_carrera WHERE car.id_carrera =?"); // Sólo una tabla
        $sentencia->execute([$idCarrera]); // ejecuta
        $carrera = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
        return $carrera;

    }

    public function insertCarrera($carrera,$cant_anios){
        // 1. abro la conexiÃ³n con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');

        // 2. enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO carrera (nombre,cant_anios) VALUES(?, ?)"); // prepara la consulta
        $sentencia->execute([$carrera, $cant_anios]); // ejecuta

    }

    

    

}

?>