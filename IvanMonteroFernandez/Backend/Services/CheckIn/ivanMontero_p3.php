<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php

    include "/xampp/htdocs/M07_Servidor/m07_login/IvanMonteroFernandez/Backend/ConnectionsConf/dbConfig.php";

    //Post de los inputs
    $user_id = $_POST["user_id"];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    //Los POST de los radios se asignan mediante función , ya que primero hay que validarlos.
    $rol;
    $active;
    //Validaciones para no recibir campos nulos
    function validaciones(): bool
    {
        global $user_id, $name, $surname, $password, $email;
        //Validaciones de tipo number devuelven 0 por defecto si no se rellenan.
        return (isset($user_id) && $user_id !== 0 &&
            isset($name) && $name !== "" &&
            isset($surname) && $surname !== "" &&
            isset($password) && $password !== "" &&
            isset($email) && $email !== ""
        );
    };
    //Validaciones Active y Rol 
    function validacionActive(): bool
    {
        global $active;
        if(isset($_POST['active'])){
            $active=$_POST['active'];
            return true;
        }
        return false;
    }
    function validacionRol(): bool
    {
        global $rol;
        if(isset($_POST['rol'])){
            $rol=$_POST['rol'];
            return true;
        }
        return false;
    }
   

    try {

        try {
            $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME); //Nos conectamos a la BD

            if (validaciones() && validacionRol() && validacionActive()) {
                //Query para insertar los datos del formulario.
                $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) 
                VALUES ('$user_id','$name','$surname','$password','$email','$rol','$active')";

                mysqli_query($connect, $query);

                header('Location:resultat.php'); //Nos devuelve el resultado de la consulta 
            } else {
                include "../../../Frontend/practica3.html";
                if (!validaciones()) {
                    echo "<br><p style= color:red ><b>Por favor rellena todos los campos con datos válidos y no vacíos.</b><p><br>";
                }
                //Se usa Javascript para imprimir el resultado donde quiero del HTML , y tengo que ejecutarlo después del Include , ya que el código PHP se ejecuta antes en el servidor antes del DOM , y con el include se ejecutará después.
                if (!validacionActive()) {
                    echo "<script>document.getElementById('mensaje-error-active').textContent = 'Por favor selecciona un valor para el campo \"Activo\".';</script>";
                }
                if (!validacionRol()) {
                    echo "<script>document.getElementById('mensaje-error-rol').textContent = 'Por favor selecciona un valor para el campo \"Rol\".';</script>";
                }
                //Por último si deseamos volver al login una vez la pagina nos ha dado error, no podremos si no hacemos lo siguiente, ya que la ruta habrá cambiado
                modificarRutasHtml();
               
            }
        } catch (Exception $e) {
            echo " La conexión con la base de datos ha fallado : ", $e->getMessage();
        }
    } catch (Exception $e) {
        echo "Ha ocurrido un error inesperado :  ", $e->getMessage(), "\n";
    } finally {
        mysqli_close($connect);
    }

    function modificarRutasHtml(){
        echo "<script>document.getElementById('volver-login').href = '../Frontend/login.html';</script>";
    }
    ?>


</body>

</html>