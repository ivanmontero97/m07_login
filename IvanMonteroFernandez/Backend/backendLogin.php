<?php
include "../Backend/ConnectionsConf/dbConfig.php"; //Para tener las variables de la cadena conexion a la BD

$emailLogin = $_POST["emailLogin"]; //Los inputs de tipo texto , si se envían sin valor , por defecto serán cadena vacía y no null . Es un estándar HTML y PHP.
$passwordLogin = $_POST["passwordLogin"];

//El primer try catch es para comprobar si el servicio esta operativo o errores inesperados
try {

    try { //Este segundo try es para comprobar si podemos conectar con el schema de la BD.

        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME); 

        //Comprobamos si el usuario ha rellenado los campos del login
        if (isset($emailLogin) && $emailLogin !== "" && isset($passwordLogin) && $passwordLogin !== "") {  
            
            $query = "SELECT email , password , name , surname , rol FROM User WHERE email='$emailLogin' AND password='$passwordLogin' "; //Query , cogemos los campos que nos interesan
            $result = mysqli_query($connect, $query);  //Esto no devuelve un array , devuelve un objeto mysqli_result
             
            /*
            ********IMPORTANTE  SOBRE mysqli_query y el resultado de esta funcion mysqli_result **********
            -Cuando utilizas mysqli_query, no obtienes un array directamente, sino un objeto mysqli_result. 
            -Sin embargo, el objeto mysqli_result se puede recorrer como si fuera un array debido a la implementación interna de PHP 
            -Por eso para las comprobaciones de los if , no se puede comprobar directamente el objeto mysqli_result y se debe obtener una fila(row) sobre result y no hace falta para hacer un foreach(por la implementacion interna de PHP)          
            */

            //Comprobamos si la Query devuelve un resultado
            if (mysqli_num_rows($result) > 0) { 
                
                $row = mysqli_fetch_assoc($result); //Pasamos el $result a un tipo de array . Podemos usar distintas funciones como mysqli_fetch_assoc , mysqli_fetch_array , mysqli_fetch_row

                //Validamos si los usuarios son alumno , profesor o nulo(ya que faltan reglas de validación)
                if ($row["rol"] == "alumnat") {//Comprobamos si el rol es alumno

                    
                    ?><?php  echo "Eres un alumno : ";?><br><?php
                    ?><?php  echo "Nombre : " . $row["name"];?><br><?php
                    ?><?php echo "Apellido : " . $row["surname"];?><br><?php
                    ?><?php echo "Correo :" . $row["email"];?><br><?php
                    routesHTML(); //Esta función esta definida mas abajo.
                }
                elseif ($row["rol"] == "professorat") {
                    
                    $queryForAllResultsInBd = "SELECT email , password , name , surname , rol FROM User"; //Nueva Query para mostrar todos los resultados
                    $resultAllResultsInBd =mysqli_query($connect,$queryForAllResultsInBd);
                    ?><?php  echo "Eres un Profesor  y los resultados de todos los demás usuarios son : ";?><br><?php
            
                    foreach($resultAllResultsInBd as $res){                       
                        ?><?php  echo "Nombre : " . $res["name"];?><br><?php
                        ?><?php echo "Apellido : " . $res["surname"];?><br><?php
                        ?><?php echo "Correo :" . $res["email"];?><br><?php
                        ?><br><?php
                        
                    }                      
                    routesHTML();
                } elseif ($row["rol"] == null) {
                    echo "No se ha seleccionado un rol a la hora de registrarse"; //Incluyo una tercera validación , para evitar excepción no controlada. Como no hay reglas de validación un usuario puede registrarse sin elegir un rol.
                }
            // Si la Query no tiene resultados por datos inválidos.
            } else {
                include "../Frontend/login.html"; //El Include da muchos errores con las rutas hay que tener cuidado, a veces no las reconoce con "/" o "../" de manerá automática y hay que picarlas a mano.
                 echo"<br><p style= color:red ><b>Los datos introducidos no son válidos , por favor intentalo de nuevo</b><p><br>";   
            }
        //Si el usuario no ha rellenado los campos del login
        } else {
            include "../Frontend/login.html"; //El Include da muchos errores con las rutas hay que tener cuidado, a veces no las reconoce con "/" o "../" de manerá automática y hay que picarlas a mano.
            echo"<br><p style= color:red ><b>Por favor rellena el email y/o contraseña correctamente</b><p><br>";
        
        }
    } catch (Exception $e) {
        echo " La conexión con la base de datos ha fallado : ", $e->getMessage(mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
} finally {
    mysqli_close($connect);
}


//Defino una función para poner los enlaces de vuelta en los distintos resultados que nos lleve  a los distintos html
function routesHTML(){
    ?><br><a href="../Frontend/login.html"><b>Volver a probar los resultados iniciando sesión</b></a><?php
    ?><br><a href="../Frontend/practica3.html"><b>Registrar otro usuario</b></a><?php
}

