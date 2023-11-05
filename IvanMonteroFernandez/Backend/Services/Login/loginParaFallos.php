<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- He tenido que crear este login porque cuando hay un fallo en el registro y hago un include del login.html
    no me deja iniciar sesión correctamente ya que la URL es distinta y no tengo forma de arreglarlo sin utilizar Buffers
    que no se utilizarlos (Esto lo deduzco según internet). -->

    <form id="formulario-login" method="POST" action="backendLogin.php">
        <div>
            <label>Introduce el <b>email</b></b></label>

            <input type="text" name="emailLogin" >
        </div>
        <div>
            <label>Introduce la <b>contraseña</b>:</label>
            <input type="password" name="passwordLogin" >
        </div>
        <br>
         <div>
            <label> Recordar contraseña </label>
            <input type="radio" id="rememberMe" value="true">
        </div>
        <br>   
        <input type="submit" value="Siguiente">
        <p  id="mensaje-error-login" style= color:red ><b></b><p>
    </form>
    <br>
    <p>¿Aún no tienes cuenta? </p>
     <a href="practica3.html">  <b>Crear cuenta</b> </a>
</body>
</html>