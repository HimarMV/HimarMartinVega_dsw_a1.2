<html>
    <body>
        <form action="registra_dudas.php" method="post">
            Correo: <input type="text" name="correo_usuario"><br>
            Módulo: 
            <select name="modulo_usuario">
                <option value="DPL">DPL</option>
                <option value="DSW">DSW</option>
                <option value="SOJ">SOJ</option>
                <option value="DEW">DEW</option>
                <option value="DOR">DOR</option>
                <option value="IPW">IPW</option>
                <option value="E1B">E1B</option>
            <select><br>
            Asunto: <input type="text" name="asunto_usuario"><br>
            Descripción: <textarea name="descripcion_usuario"></textarea><br>
            <label><b>Temas relacionados:</b></label><br>
                <input type="checkbox" name="temas_usuario[]" value="Linux"> Linux<br>
                <input type="checkbox" name="temas_usuario[]" value="Windows"> Windows<br>
                <input type="checkbox" name="temas_usuario[]" value="PHP"> PHP<br>
                <input type="checkbox" name="temas_usuario[]" value="HTML"> HTML<br>
                <input type="checkbox" name="temas_usuario[]" value="Javascript"> Javascript<br>
                <input type="checkbox" name="temas_usuario[]" value="Bash"> Bash<br>
                <input type="checkbox" name="temas_usuario[]" value="Calificaciones"> Calificaciones<br>
                <input type="checkbox" name="temas_usuario[]" value="Actividades"> Actividades<br>
                <input type="checkbox" name="temas_usuario[]" value="Exámenes"> Exámenes<br>
                <input type="checkbox" name="temas_usuario[]" value="Otros"> Otros<br>
            <input type="submit" value="Enviar">
        </form>
    </body>

</html>