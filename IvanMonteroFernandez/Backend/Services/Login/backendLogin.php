<?php
include "../../ConnectionsConf/dbConfig.php"; //Para tener las variables de la cadena conexion a la BD

$emailLogin = $_POST["emailLogin"]; //Los inputs de tipo texto , si se envían sin valor , por defecto serán cadena vacía y no null . Es un estándar HTML y PHP.
$passwordLogin = $_POST["passwordLogin"];

//El primer try catch es para comprobar si el servicio esta operativo o errores inesperados
try {

    try { //Este segundo try es para comprobar si podemos conectar con el schema de la BD.
        session_start();
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME); 

        //Comprobamos si el usuario ha rellenado los campos del login
        if (isset($emailLogin) && $emailLogin !== "" && isset($passwordLogin) && $passwordLogin !== "") {  
            
            $query = "SELECT * FROM User WHERE email='$emailLogin' AND password='$passwordLogin' "; //Query , cogemos los campos que nos interesan
            $result = mysqli_query($connect, $query);  //Esto no devuelve un array , devuelve un objeto mysqli_result
            $row = mysqli_fetch_assoc($result);
            /*
            ********IMPORTANTE  SOBRE mysqli_query y el resultado de esta funcion mysqli_result **********
            -Cuando utilizas mysqli_query, no obtienes un array directamente, sino un objeto mysqli_result. 
            -Sin embargo, el objeto mysqli_result se puede recorrer como si fuera un array debido a la implementación interna de PHP 
            -Por eso para las comprobaciones de los if , no se puede comprobar directamente el objeto mysqli_result y se debe obtener una fila(row) sobre result y no hace falta para hacer un foreach(por la implementacion interna de PHP)          
            */
            
            //Comprobamos si la Query devuelve un resultado
            if (mysqli_num_rows($result) > 0) { 
                
                // Creamos las variables de sesión
                $_SESSION["loggedIn"]= true;
                $_SESSION["name"]= $row["name"];
                $_SESSION["rol"]= $row["rol"];
                $_SESSION["user_id"]= $row["user_id"];

                //Redirección a la siguiente práctica
                header('Location:resultatLogin.php');

               
            } else {
                include "loginParaFallos.php"; //El Include da muchos errores con las rutas hay que tener cuidado, a veces no las reconoce con "/" o "../" de manerá automática y hay que picarlas a mano.
                echo"<br><p style= color:red ><b>Los datos introducidos no son válidos , por favor intentalo de nuevo</b><p><br>";   
            
            }
        //Si el usuario no ha rellenado los campos del login
        } else {
            include "loginParaFallos.php"; //El Include da muchos errores con las rutas hay que tener cuidado, a veces no las reconoce con "/" o "../" de manerá automática y hay que picarlas a mano.
            echo"<br><p style= color:red ><b>Por favor rellena el email y/o contraseña correctamente</b><p><br>";
        
        }
    } catch (Exception $e) {
        echo " La conexión con la base de datos ha fallado : ", mysqli_connect_error();
    } finally {
        mysqli_close($connect);
    }
} catch (Exception $e) {
    echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
}




