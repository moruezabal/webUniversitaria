<?php

class CarrerasView{

    function showCarreras($carreras){

        $html = $this->mostrarHeader();
        echo ($html);

        echo ("<h1>Nuestras carreras</h1>");

        // arma la tabla con la información de la base de datos
        echo "<table class='table' style='width:450px'>";
        echo "<tr><th scope='col'>Carrera</th><th scope='col'>Años</th></tr>";

        foreach ($carreras as $carrera) {
            $idCarrera = $carrera->id_carrera;

            echo "<tr><td>" . $carrera->nombre . "</td><td>" . $carrera->cant_anios . "</td><td>" .
                "<a href='ver/" . $idCarrera . "'>Ver
            
            </a></td></tr>";
        }
        echo ("</table>");
        echo ("</div>");
    }

    public function showCarrera($infoCarrera){

        $html = $this->mostrarHeader();
        echo ($html);

        $titulo = $infoCarrera[0]->carrera;
        echo "<table class='table' style='width:450px'>";
        echo "<caption>" . $titulo . "</caption>";

        echo "<tr><th scope='col'>Materia</th><th scope='col'>Profesor</th></tr>";

        foreach ($infoCarrera as $data) {

            echo "<tr><td>" . $data->nombre . "</td><td>" . $data->profesor . "";

            echo "</td></tr>";
        }
        echo ("</table>");
    }


    function mostrarHeader(){

        echo ('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Universidad Europea</title>
                <base href=" ' . BASE_URL . '">
                <link rel="stylesheet" href="' . BASE_URL . 'css/style.css">
            </head>
            <body>
                <header class="header">
                    <img src="' . BASE_URL . '/img/UEM-Logo.png" alt="Logo universidad Europea">
                </header>
                <div class="barra">
                    <nav class="nav">
                        <a href="index.html">Carrera</a>
                        <a href="nosotros.html">Materias</a>
                    </nav>
                </div>
        ');
    }
}
