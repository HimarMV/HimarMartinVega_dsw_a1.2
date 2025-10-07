<?php
    print_r($_REQUEST);
    echo "<br>";

    $correo = $_REQUEST['correo_usuario'];
    $modulo = $_REQUEST['modulo_usuario'];
    $asunto = $_REQUEST['asunto_usuario'];
    $descripcion = $_REQUEST['descripcion_usuario'];

    echo "Correo: " . $correo . "<br>";
    echo "Módulo: " . $modulo . "<br>";
    echo "Asunto: " . $asunto . "<br>";
    echo "Descripción: " . $descripcion . "<br>";
?>