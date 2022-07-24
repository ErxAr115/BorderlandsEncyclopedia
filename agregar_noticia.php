<?php
    $host = "localhost";
    $puerto = "3306";
    $usuario = "root";
    $contrasena = "";
    $database = "proyecto";
    $tabla = "noticias";

    function Conectar(){
        global $host, $puerto, $usuario, $contrasena, $database, $tabla;

        if(!($link = mysqli_connect($host, $usuario, $contrasena))) {
            echo "<script type='text/javascript'>alert('Error al conectar a la base de datos.');</script>";
            exit();
        }

        if (!mysqli_select_db($link, $database)) {
            echo "Error seleccionando la base de datos.<br>";
            exit();
        }

        return $link;
    }

    $link = Conectar();

    if($_POST){
        $InsertQuery = "INSERT INTO $tabla (titulo,autor,fecha,contenido,imagen) VALUES ('".$_POST['titulo']."','".$_POST['autor']."','".$_POST['fecha']."','".$_POST['contenido']."','".$_POST['imagen']."')";

        $result = mysqli_query($link, $InsertQuery);

        if($result) {
            echo "<script type='text/javascript'>alert('Los datos se insertaron correctamente.');</script>";
        } else {
            echo "<script type='text/javascript'>alert('No se insertaron los datos.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_B.png">
    <title>Borderlands Encyclopedia</title>
</head>
<body>
    <a href="administracion.html">Volver al manejador</a>
</body>
</html>