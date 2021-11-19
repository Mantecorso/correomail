<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formularioEnvio</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>

    <h1>Formulario ejemplo.php</h1>
    <form action="enviar1.php"  enctype="multipart/form-data" method="POST" target="resultado">
        <fieldset>
            <legend for="nombre">Nombre</legend>
            <input type="text" name="nombre" required class="inp">
        </fieldset>
        <fieldset>
            <legend for="email">Correo</legend>
            <input type="mail" name="email" required class="inp">
        </fieldset>
        <fieldset>
            <legend for="telefono">Teléfono</legend>
            <input type="tel" name="telefono" required class="inp">
        </fieldset>
        <fieldset>
            <legend for="archivo">Archivo</legend>
            <input type="file" name="archivo" required class="inp">
        </fieldset>
        <fieldset>
            <legend for="departamento">Departamento</legend>
            <select name="departamento">
                <option value="dep1" selected>Comercial</option>
                <option value="dep2">Técnico</option>
                <option value="dep3">Administrativo</option>
            </select>
        </fieldset>
        <fieldset class="radiob">
            <legend for="importante">Importancia</legend>
            <input type="radio" name="importante"> ALTA
            <input type="radio" name="importante"> MEDIA
            <input type="radio" name="importante" checked> BAJA
        </fieldset>
        <fieldset>
            <legend for="asunto">Asunto</legend>
            <input type="text" name="asunto" required class="inp">
        </fieldset>
        <fieldset>
            <legend for="mensaje">Mensaje</legend>
            <textarea name="mensaje" required class="inp"></textarea>
        </fieldset>
        <fieldset>
            <input type="reset" value="BORRAR" class="bot">
            <input type="submit" value="ENVIAR" class="bot">
        </fieldset>
    </form>
    <div class="centradito">
        <iframe style="width:60%; height:100px; border:6px double black; margin:20px auto; background: rgb(157, 157, 240);" name="resultado" frameborder="0"></iframe>
    </div>
    

</body>
</html>