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
 include "../Backend/ConnectionsConf/dbConfig.php";
 try //Primer try para errores como falta de conexión a internet,caida servidores,etc.
 { 
    //Título H2 de la práctica
    ?><h2><?php echo "Hola " . $_SESSION["name"] . " eres un " . $_SESSION["rol"]  ?></h2><?php //Definimos el nombre y el rol en función de la sesión
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
    }?>
    <a href="http://localhost/M07_Servidor\m07_login\IvanMonteroFernandez\Backend\mostrarInformacion.php?user_id=<?php echo $_SESSION['user_id']; ?>"> Mostrar información detallada</a>
    <a href="disconnect.php">Desconectar</a><?php 

} catch (Exception $e) {
        echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
}?>

</body>

</html>