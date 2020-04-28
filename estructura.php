
<link rel="stylesheet" href="' . BASE_URL . '/css/style.css">
<img src="../" alt="">
<?php

function mostrarHeader(){

    echo('
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
    '
);
}

?>