<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php

 session_start();
 include "../../ConnectionsConf/dbConfig.php";

 try //Primer try para errores como falta de conexión a internet,caida servidores,etc.
 { 
    //Configuración de la muestra de información de las cookies : Cambiar idioma y cambiar color del boton del idioma.
    //Título H2 de la práctica
   
    if(isset($_COOKIE["idioma"])) {     //Comprobamos que la cookie existe y por tanto es distinto de null

        if($_COOKIE["idioma"] == "Es"){            
            echo "<h2> Hola  {$_SESSION["name"]} eres un {$_SESSION["rol"]}  </h2>";
            ?><a href="idioma.php?idioma=Es"  style="color: red;">Es</a>
            <a href="idioma.php?idioma=Cat" style="color: blue;">Cat</a>
            <a href="idioma.php?idioma=En"  style="color: blue;">En</a>
            <a href="delete.php">Eliminar</a> <?php
        
        } else if ($_COOKIE["idioma"] == "Cat"){
            echo "<h2> Hola {$_SESSION["name"]} ets un  {$_SESSION["rol"]}  </h2>";
            ?><a href="idioma.php?idioma=Es"  style="color: blue;">Es</a>
            <a href="idioma.php?idioma=Cat" style="color: red;">Cat</a>
            <a href="idioma.php?idioma=En"  style="color: blue;">En</a>
            <a href="delete.php">Esborrar</a> <?php    
        
        } else if ($_COOKIE["idioma"] == "En"){
        
            echo "<h2> Hello {$_SESSION["name"]} you are {$_SESSION["rol"]}  </h2>";
            ?><a href="idioma.php?idioma=Es"  style="color: blue;">Es</a>
            <a href="idioma.php?idioma=Cat" style="color: blue;">Cat</a>
            <a href="idioma.php?idioma=En"  style="color: red;">En</a>
            <a href="delete.php">Delete</a> <?php           
        }
    }  else {
       // echo "No esta definida la COOKIE"; //Comprobaciones
        echo  "<h2>Hola {$_SESSION["name"]} eres un {$_SESSION["rol"]}  </h2>";
        ?><a href="idioma.php?idioma=Es"  style="color: red;">Es</a>
        <a href="idioma.php?idioma=Cat" style="color: blue;">Cat</a>
        <a href="idioma.php?idioma=En"  style="color: blue;">En</a>
        <a href="delete.php">Eliminar</a> <?php
    }
       
    if ($_SESSION["rol"] == "professorat") 
    {
        
        try //Segundo try para errores con la conexión con la BD
        {
            $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
            $query = "SELECT * FROM User";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result)>0) 
            {
                ?><table>
                    <th>Nom</th>
                    <th>Cognom</th>
                    <th>Email</th>
                    <?php    
                    foreach ($result as $res) 
                    {    
                    ?><tr><?php
                        ?><td><?php echo $res["name"]; ?></td><?php
                        ?><td><?php echo $res["surname"]; ?></td><?php
                        ?><td><?php echo $res["email"]; ?></td><?php
                    ?></tr><?php
                    }?>
                </table><?php

            }
        } catch (Exception $e) {
        echo " La conexión con la base de datos ha fallado : ", mysqli_connect_error();
        } finally {
        mysqli_close($connect);
        }
    }

     if(isset($_COOKIE["idioma"])) {
        if($_COOKIE["idioma"]=="Es"){
        ?><a href="http://localhost/M07_Servidor\m07_login\IvanMonteroFernandez\Backend\Services\Login\mostrarInformacion.php?user_id=<?php echo $_SESSION['user_id']; ?>"> Mostrar información detallada</a>
        <a href="disconnect.php">Desconectar</a><?php 
        
        } else if($_COOKIE["idioma"]=="Cat"){
        ?><a href="http://localhost/M07_Servidor\m07_login\IvanMonteroFernandez\Backend\Services\Login\mostrarInformacion.php?user_id=<?php echo $_SESSION['user_id']; ?>"> Mostrar informació detallada</a>
        <a href="disconnect.php">Desconnectar</a><?php 
        
        } else if($_COOKIE["idioma"]=="En"){
        ?><a href="http://localhost/M07_Servidor\m07_login\IvanMonteroFernandez\Backend\Services\Login\mostrarInformacion.php?user_id=<?php echo $_SESSION['user_id']; ?>"> Show detailed information</a>
        <a href="disconnect.php">Disconnect</a><?php      
        
    } 
    } else {
        ?><a href="http://localhost/M07_Servidor\m07_login\IvanMonteroFernandez\Backend\Services\Login\mostrarInformacion.php?user_id=<?php echo $_SESSION['user_id']; ?>"> Mostrar información detallada</a>
        <a href="disconnect.php">Desconectar</a><?php 
    }
} catch (Exception $e) {
        echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
}?>

</body>

</html>