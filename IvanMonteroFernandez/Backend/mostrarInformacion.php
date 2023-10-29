    <?php 
    session_start();
    include ('../Backend/ConnectionsConf/dbConfig.php');
    //Configuramos que el loggedin no sea falso(desconectar)
    // ya que en el caso de que lo sea volverá al inicio
    if  ($_SESSION["loggedIn"] == false){ 
        header('location:login.html');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME); 
$id = $_GET["user_id"];

try{
    try{

        //Seleccionamos todos los campos del usuario con el ID que nos viene en la URL a través del GET     
        $query = "SELECT * FROM `user` WHERE `user_id` = '$id'";  
        $result = mysqli_query($connect,$query); //Ejecutamos la query
        mysqli_num_rows($result);
        $dato= mysqli_fetch_array($result);

        if(mysqli_num_rows($result) > 0){
        //Consulta
        echo "Id: ". $dato["user_id"]. "<br/>";
        echo "Nombre: ". $dato["name"]. "<br/>";
        echo "Apellido: ". $dato["surname"]. "<br/>"; 
        echo "Email: ". $dato["email"]. "<br/>";
        echo "Rol: ".  $dato["rol"]. "<br/>";
        echo "Activo: ". $dato["active"]. "<br/>";
        } else {
            echo "La consulta ha fallado";
        }
    
    } catch (Exception $e){
        echo " La conexión con la base de datos ha fallado : ", mysqli_connect_error();
    } finally {
        mysqli_close($connect);        
    }
} catch (Exception $e) {
    echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
}
?>
<a href="resultatLogin.php"> Volver a la página anterior</a>
</body>
</html>