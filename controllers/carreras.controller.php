<?php

require_once 'models/carreras.model.php';
require_once 'views/carreras.view.php';


class CarrerasController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CarrerasModel();
        $this->view = new CarrerasView();
    }

    public function showCarreras(){
        // Pido las tareas al MODELO
        $carreras = $this->model->getAll();

        // Actualizo la VISTA
        $this->view->showCarreras($carreras);
    }

    public function showCarrera($idCarrera){

        $infoCarrera = $this->model->getCarrera($idCarrera);
        $this->view->showCarrera($infoCarrera);
    }

    public function showMaterias(){
        // Pido las tareas al MODELO
        $materias = $this->model->getMaterias();
        // Actualizo la VISTA   
        $this->view->showMaterias($materias);
    }

    public function addCarrera(){

        // toma los valores enviados por el usuario
        $carrera = $_POST['carrera'];
        $cant_anios = $_POST['cant_anios'];

        // verifica los datos obligatorios
        if (!empty($carrera) && !empty($cant_anios)) {
            // inserta en la DB y redirige
            $this->model->insertCarrera($carrera, $cant_anios);
            header('Location: ' . BASE_URL . "carreras");
        } else {
            $this->view->showError("ERROR! Faltan datos obligatorios"); //FALTA HACER FUNCION
        }
    }

    public function addMateria(){

        $materia = $_POST['materia'];
        $profesor = $_POST['profesor'];
        $carrera = $_POST['carrera'];

        // verifica los datos obligatorios
        if (!empty($materia) && !empty($profesor) && !empty($carrera)) {
            // inserta en la DB y redirige
            $this->model->insertMateria($materia, $profesor, $carrera);
            header('Location: ' . BASE_URL . "carreras");
        } else {
            $this->view->showError("ERROR! Faltan datos obligatorios"); //FALTA HACER FUNCION
        }
    }

    public function eraseCarrera($idCarrera){

        $success = $this->model->deleteCarrera($idCarrera);
        if ($success){
            header('Location: ' . BASE_URL . "carreras");
        }
        else {
            echo ("<h1>Debes borrar las materias de esta carrera previamente</h1>");
        }
    }

    public function eraseMateria($idMateria){

        $this->model->deleteMateria($idMateria);
        header('Location: ' . BASE_URL . "materias");
    }
}