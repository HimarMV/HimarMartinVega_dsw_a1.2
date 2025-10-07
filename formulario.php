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
            Asunto: <input type="text" value="asunto_usuario">
            Descripción: <textarea name="descripcion_usuario"></textarea><br>
            <input type="submit" value="enviar">
        </form>
    </body>

</html>