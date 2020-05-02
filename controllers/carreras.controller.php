<?php

require_once 'models/carreras.model.php';
require_once 'views/carreras.view.php';


class CarrerasController {

    public function showCarreras(){
        // Pido las tareas al MODELO

        $model = new CarrerasModel;
        $carreras = $model->getAll();

        // Actualizo la VISTA
        $view = new CarrerasView;
        $view->showCarreras($carreras);
    }

    public function showCarrera($idCarrera){

        $model = new CarrerasModel;
        $infoCarrera = $model->getCarrera($idCarrera);
        
        $view = new CarrerasView;
        $view->showCarrera($infoCarrera);
    }

    public function addCarrera(){
        
        // toma los valores enviados por el usuario
        $carrera = $_POST['carrera'];
        $cant_anios = $_POST['cant_anios'];
    
        // verifica los datos obligatorios
        if (!empty($carrera) && !empty($cant_anios)) {
            // inserta en la DB y redirige
            $model = new CarrerasModel;
            $model->insertCarrera($carrera,$cant_anios);
            header('Location: ' . BASE_URL . "carreras");
        } else {
            $view = new CarrerasView;
            $view->showError("ERROR! Faltan datos obligatorios"); //FALTA HACER FUNCION
        }

    }

    public function addMateria(){

    }
       
    
}

?>