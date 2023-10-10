<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <?php
    
   
    //Post de los inputs
     $user_id = $_POST["user_id"];
     $name= $_POST['name'];
     $surname = $_POST['surname'];
     $password =$_POST['password'];
     $email = $_POST['email'];
     
     if($_POST['alumnat'] != null){
        $alumnat = $_POST['alumnat'];
     } else {
    
     $professorat =$_POST['professorat'];
     }


     $activado =$_POST['active'];
     $desactivado = $_POST['active'];
     
     $active;
     $rol ;

     //Cadena de conexion
    define("DB_HOST","localhost");
    define("DB_NAME","users");
    define("DB_USER","root");
    define("DB_PSW",'');
    
    $active = $activado != null ? $activado : $desactivado;
    $rol = $alumnat != null ? $alumnat : $professorat;
    
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

    $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) 
    VALUES ('$user_id','$name','$surname','$password','$email','$rol','$active')" ;
   
    if(!$connect)
    {
        echo "Error de conexión : " . mysqli_connect_error();
    } else {
        

       mysqli_query($connect,$query);

        echo "Todo ha saludo bien";
    }
    mysqli_close($connect);

    

    ?>
</body>
</html>