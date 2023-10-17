<?php 
//include "/xampp/htdocs/M07_login/m07_login/IvanMonteroFernandez/Backend/ConnectionsConf/dbConfig.php";
$emailLogin = $_POST["emailLogin"];
$passwordLogin = $_POST["passwordLogin"];
define("DB_HOST","localhost");
    define("DB_NAME","users");
    define("DB_USER","root");
    define("DB_PSW",'');

try {
    
    try {
        $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
        if( isset($emailLogin) & isset($passwordLogin)){
            $query = "SELECT email,password FROM User WHERE email='$emailLogin' AND password='$passwordLogin' ";
            $result = mysqli_query($connect,$query);
            if($result != null){
                var_dump($result);
            }

        } else {
            echo "Por favor rellena el email y/o contraseña";
        }
    } catch (Exception $e) {
        echo " La conexión con la base de datos ha fallado : ", $e -> getMessage();
    }
} catch (Exception $e) {
    echo "Ha ocurrido un error inesperado :  ",$e ->getMessage() , "\n";
} 
finally {
    mysqli_close($connect);
}
?>