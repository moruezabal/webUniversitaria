<?php

class CarrerasModel{

    public function getAll() {

        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
        
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM carrera"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
        return $carreras;   
    }

    public function getCarrera($idCarrera){
        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
    
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT car.nombre AS carrera, mat.nombre, mat.profesor FROM materia mat INNER JOIN carrera car  ON mat.id_carrera=car.id_carrera WHERE car.id_carrera =?"); // Sólo una tabla
        $sentencia->execute([$idCarrera]); // ejecuta
        $carrera = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
        return $carrera;

    }

    public function getMaterias(){
         // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');
        
        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT car.nombre AS carrera, mat.nombre, mat.profesor, mat.id_materia AS id FROM materia mat INNER JOIN carrera car  ON mat.id_carrera=car.id_carrera WHERE car.id_carrera = mat.id_carrera"); // Sólo una tabla
        $sentencia->execute(); // ejecuta
        $materias = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    

        return $materias;
    
    }

    public function insertCarrera($carrera,$cant_anios){
        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');

        // 2. enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO carrera (nombre,cant_anios) VALUES(?, ?)"); // prepara la consulta
        $sentencia->execute([$carrera, $cant_anios]); // ejecuta

    }

    public function insertMateria($materia,$profesor,$carrera){
        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');

        // 2. enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO materia (nombre,profesor,id_carrera) VALUES(?, ?, ?)"); // prepara la consulta
        $sentencia->execute([$materia,$profesor,$carrera]); // ejecuta

    }  

    public function deleteCarrera($idCarrera){
        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM carrera WHERE id_carrera = ?"); // prepara la consulta
        $success = $sentencia->execute([$idCarrera]); // ejecuta
        return $success;
    }  

    public function deleteMateria ($idMateria){
        // 1. abro la conexión con MySQL 
        $db = new PDO('mysql:host=localhost;'.'dbname=web_universitaria;charset=utf8', 'root', '');

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM `materia` WHERE `id_materia` = ?"); // prepara la consulta
        $sentencia->execute([$idMateria]); // ejecuta

    }




}

?>