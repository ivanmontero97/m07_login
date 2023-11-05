<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creamos las cookies</title>
</head>
<body>
    <?php 
    //Creamos la cookie del idioma

   setcookie("idioma", $_GET["idioma"], time()+8600); //Indicamos que dure 10 minutos
    header('Location:resultatLogin.php'); 

    ?>
</body>
</html>