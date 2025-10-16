<?php
function validarCorreo($correo) {
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return "El correo electrónico no tiene un formato válido.";
    }
    return true;
}

function validarModulo($modulo, $modulos_validos) {
    if (!in_array($modulo, $modulos_validos)) {
        return "El módulo seleccionado no es válido.";
    }
    return true;
}

function validarAsunto($asunto) {
    if (empty($asunto)) {
        return "El asunto no puede estar vacío.";
    }
    if (strlen($asunto) > 50) {
        return "El asunto no debe contener más de 50 caracteres.";
    }
    if (is_numeric($asunto)) {
        return "El asunto no debe contener solo caracteres numéricos.";
    }
    return true;
}

function validarDescripcion($descripcion) {
    if (empty($descripcion)) {
        return "La descripción no puede estar vacía.";
    }
    if (strlen($descripcion) > 300) {
        return "La descripción no debe contener más de 300 caracteres.";
    }
    return true;
}

function validarTemas($temas, $temas_validos) {
    if (empty($temas)) {
        return "Debe seleccionar al menos un tema relacionado.";
    }

    if (!is_array($temas)) {
        return "El formato de los temas no es válido.";
    }

    foreach ($temas as $tema) {
        if (!in_array($tema, $temas_validos)) {
            return "Uno o más temas seleccionados no son válidos.";
        }
    }

    $cantidad = count($temas);
    if ($cantidad < 1 || $cantidad > 3) {
        return "Debe seleccionar entre 1 y 3 temas relacionados.";
    }

    return true;
}

$correo = $_REQUEST['correo_usuario'] ?? '';
$asunto = $_REQUEST['asunto_usuario'] ?? '';
$descripcion = $_REQUEST['descripcion_usuario'] ?? '';
$modulo = $_REQUEST['modulo_usuario'] ?? '';
$temas = $_REQUEST['temas_usuario'] ?? [];

$modulos_validos = ["DSW", "IPW", "CI4", "DEW", "DOR", "DPL", "E1B", "SOJ"];
$temas_validos = ["Linux", "Windows", "PHP", "HTML", "Javascript", "Bash", "Calificaciones", "Actividades", "Exámenes", "Otros"];

$errores = [];

$resultado = validarCorreo($correo);
if ($resultado !== true) $errores[] = $resultado;

$resultado = validarModulo($modulo, $modulos_validos);
if ($resultado !== true) $errores[] = $resultado;

$resultado = validarAsunto($asunto);
if ($resultado !== true) $errores[] = $resultado;

$resultado = validarDescripcion($descripcion);
if ($resultado !== true) $errores[] = $resultado;

$resultado = validarTemas($temas, $temas_validos);
if ($resultado !== true) $errores[] = $resultado;

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

$temas_string = implode(", ", $temas);

$myfile = fopen("data/dudas.csv", "a") or die("No se pudo abrir el archivo.");
$datos = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\";\"$temas_string\"\n";
fwrite($myfile, $datos);
fclose($myfile);

echo "Datos registrados correctamente ✅<br>";
echo "Pulsa aquí para realizar otro formulario: ";
echo "<button><a href='formulario.php'>Pulsa Aquí</a></button><br>";
?>