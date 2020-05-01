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

    function showCarrera($idCarrera){

        $model = new CarrerasModel;
        $infoCarrera = $model->getCarrera($idCarrera);
        
        $view = new CarrerasView;
        $view->showCarrera($infoCarrera);
    }
       
    
}

?>