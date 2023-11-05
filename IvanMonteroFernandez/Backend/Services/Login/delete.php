<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminamos las cookies</title>
</head>
<body>
    <?php
setcookie("idioma","Es", time () -1); //También se puede eliminar poniendo false en lugar de time() -1
setcookie("idioma","Cat", time () -1);
setcookie("idioma","En", time () -1);
header('location: resultatLogin.php');
?>
</body>
</html>