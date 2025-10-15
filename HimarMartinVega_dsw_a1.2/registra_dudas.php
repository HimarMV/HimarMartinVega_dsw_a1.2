<<?php
    $correo = $_REQUEST['correo_usuario'] ?? '';
    $asunto = $_REQUEST['asunto_usuario'] ?? '';
    $descripcion = $_REQUEST['descripcion_usuario'] ?? '';
    $modulo = $_REQUEST['modulo_usuario'] ?? '';

    $errores = [];

    $modulos_validos = ["DSW", "IPW", "CI4", "DEW", "DOR", "DPL", "E1B", "SOJ"];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no tiene un formato válido.";
    }

    if (!in_array($modulo, $modulos_validos)) {
        $errores[] = "El módulo seleccionado no es válido.";
    }

    if (strlen($asunto) > 50) {
        $errores[] = "El asunto no debe contener más de 50 caracteres.";
    }
    if (is_numeric($asunto)) {
        $errores[] = "El asunto no debe contener solo caracteres numéricos.";
    }
    if (empty($asunto)) {
        $errores[] = "El asunto no puede estar vacío.";
    }

    if (strlen($descripcion) > 300) {
        $errores[] = "La descripción no debe contener más de 300 caracteres.";
    }
    if (empty($descripcion)) {
        $errores[] = "La descripción no puede estar vacía.";
    }

    if (count($errores) > 0) {
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Errores en el formulario</title>
            <style>
                body { font-family: Arial; background-color: #f8f8f8; padding: 20px; }
                h2 { color: #b30000; }
                ul { color: #333; }
                a { text-decoration: none; color: #0066cc; }
                button { margin-top: 10px; padding: 8px 15px; }
            </style>
        </head>
        <body>
            <h2>Se han encontrado los siguientes errores:</h2>
            <ul>";
            
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }

        echo "</ul>
            <button><a href='formulario.php'>Volver al formulario</a></button>
        </body>
        </html>";
        exit;
    }

    $myfile = fopen("data/dudas.csv", "a") or die("No se pudo abrir el archivo.");
    $datos = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";
    fwrite($myfile, $datos);
    fclose($myfile);

    echo "Datos registrados correctamente ✅<br>";
    echo "Pulsa aquí para realizar otro formulario: ";
    echo "<button><a href='formulario.php'>Pulsa Aquí</a></button><br>";
?>