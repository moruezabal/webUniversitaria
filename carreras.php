<?php
require_once 'db.php';
require_once 'estructura.php';

function listarcarreras(){
    $html = mostrarHeader();
    echo ($html);

    echo("<h1>Nuestras carreras</h1>");

    $carreras = getCarreras();

    // arma la tabla con la información de la base de datos
    echo "<table class='table' style='width:450px'>";
    echo "<tr><th scope='col'>Carrera</th><th scope='col'>Años</th></tr>";

    foreach ($carreras as $carrera) {
        echo "<tr><td>" . $carrera->nombre . "</td><td>" . $carrera->cant_anios . "</td></tr>";
    }
    echo("</table>");
echo("</div>");


}

function agregarcarrera(){
    
}

function agregarmateria(){
    
}



?>