<?php
    $correo = $_REQUEST['correo_usuario'];
    $asunto = $_REQUEST['asunto_usuario'];
    $descripcion = $_REQUEST['descripcion_usuario'];
    $modulos = $_REQUEST['modulo_usuario'];

    $myfile = fopen("data/dudas.csv", "a") or die("Unable to open file!");
    $datos = "\"$correo\";\"$modulos\";\"$asunto\";\"$descripcion\"\n";
    fwrite($myfile, $datos);
    fclose($myfile);
    
    echo"Datos registrados correctamente ✅". "<br>";
    echo"Pulsa aquí para realizar otro formulario"."<button><a href=\"formulario.php\">Pulsa Aqui</a></button>". "<br>";
?>