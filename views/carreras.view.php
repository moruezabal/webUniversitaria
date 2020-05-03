<?php

class CarrerasView{

    function showCarreras($carreras){

        $html = $this->showHeader();
        echo ($html);

        echo ("<h1>Nuestras carreras</h1>");

        // arma la tabla con la información de la base de datos
        echo "<table class='table' style='width:450px'>";
        echo "<tr><th scope='col'>Carrera</th><th scope='col'>Años</th><th colspan=2>Acciones</th></tr>";

        foreach ($carreras as $carrera) {
            $idCarrera = $carrera->id_carrera;

            echo "<tr><td>" . $carrera->nombre . "</td><td>" . $carrera->cant_anios . "</td><td>" .
                "<a href='ver/" . $idCarrera . "'>Ver</a></td><td>
                <a href='eliminar/" . $idCarrera . "'>Eliminar</a>
                </td></tr>";
        }
        echo ("</table>");

        //imprimo formulario para agregar carrera
        $formCarrera = $this->showFormCarrera();
        echo($formCarrera);

        //Obtengo la lista de carreras
        $i = 0;
        foreach ($carreras as $carrera){
            $clave = $carrera->id_carrera;
            $valor = $carrera->nombre;
            $listaCarreras [$clave] = $valor; // [1]=> "Arquitectura" - [2]=> "Historia" 
            $i++;
        }
        
        // Imprimo form para agregar Materias, con la lista de carreras p/ el selector
        $formMateria = $this->showFormMateria($listaCarreras);
        echo($formMateria);

    }

    public function showCarrera($infoCarrera){

        $html = $this->showHeader();
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


    private function showHeader(){

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
                        <a href="' . BASE_URL . 'carreras">Carreras</a>
                        <a href="' . BASE_URL . 'materias">Materias</a>
                    </nav>
                </div>
        ');
    }

    private function showFormCarrera(){

        // Comienzo del formulario para agregar CARRERA
        echo ("<form action='agregar/carrera' method='post'");
            echo ("<label>Carrera</label> <input name='carrera' type='text'>");
            echo ("<label>Cant. de años</label>
                    <select name='cant_anios'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>  
                    </select>");
            echo("<button type='submit'>Agregar Carrera</button>");
        echo("</form>");
    }

    private function showFormMateria($listaCarreras){

        //Comienzo del formulario para agregar MATERIA
        echo ("<form action='agregar/materia' method='post'");
            echo ("<label>Materia</label> <input name='materia' type='text'>");
            echo ("<label>Profesor</label> <input name='profesor' type='text'>");
            
            echo ("<label>Carrera</label>
                    <select name='carrera'>");

                    foreach ($listaCarreras as $id => $carrera){
                        echo ("<option value='" . $id . "'>" . $carrera ."</option>");
                    }
                    echo("</select>");
            echo("<button type='submit'>Agregar Materia</button>");
        echo("</form>");
    }

    public function showError($mensaje){

    }
}
