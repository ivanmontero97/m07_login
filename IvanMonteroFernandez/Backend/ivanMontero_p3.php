<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php

  //  include "/xampp/htdocs/M07_login/m07_login/IvanMonteroFernandez/Backend/ConnectionsConf/dbConfig.php";


    //Post de los inputs
    $user_id = $_POST["user_id"];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $active = $_POST['active'];
    $rol = $_POST['rol'];

    define("DB_HOST","localhost");
    define("DB_NAME","users");
    define("DB_USER","root");
    define("DB_PSW",'');

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);


    if (!$connect) {
        echo "Error de conexión : " . mysqli_connect_error();
    } else {


        $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) 
    VALUES ('$user_id','$name','$surname','$password','$email','$rol','$active')";

        mysqli_query($connect, $query);

        header('Location:resultat.php');
    }
    mysqli_close($connect);



    ?>
</body>

</html>