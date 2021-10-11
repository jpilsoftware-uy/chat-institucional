
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear Grupos</title>

</head>
<body>
<h1>Crear Grupos</h1>
<?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div style="color :#32a852">
            SE INGRESO CORRECTAMENTE
        </div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div style="color :#d60f0f">
            NO SE PUDO INGRESAR
        </div>
    <?php endif; ?>
    
    
    <form action="/insertarGrupo" method="POST">
        Nombre del grupo: <input type="text" name="idGrupo"></br>
        Seleccione Orientacion <select>
            <option selected disabled hidden>...</option>
            <option name="tipoDeOrienacion" value="3er Año - Énfasis en Desarrollo Web">3er Año - Énfasis en Desarrollo Web </option>
            <option name="tipoDeOrienacion" value="3er Año - Énfasis en Desarrollo y Soporte">3er Año - Énfasis en Desarrollo y Soporte</option>
            <option name="tipoDeOrienacion" value="3er Año - Énfasis en Desarrollo de Videojuegos">3er Año - Énfasis en Desarrollo de Videojuegos</option>
            <option name="tipoDeOrienacion" value="1er año - Bachillerato De Informatica">1er año - Bachillerato De Informatica</option>
            <option name="tipoDeOrienacion" value="2er año - Bachillerato De Informatica">2er año - Bachillerato De Informatica</option>
        </select> </br>
        <button type="submit">Enviar</button>


       


    
    </form>
    



</body>
</html>