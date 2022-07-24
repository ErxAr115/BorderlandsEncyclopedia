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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borderlands Encyclopedia</title>
</head>
<body>
    <?php
        $link = Conectar();

        if($_GET){
            $num = $_GET["id"];
            $queryDelete = "Delete from $tabla where noticia_id = '$num'";

            $resultDelete = mysqli_query($link, $queryDelete);

            if($resultDelete) {
                echo "<strong>Se borro el regsitro con exito</strong>";
            } else {
                echo "No se borro el registro.<br>";
            }
        }
    ?>
    <a href="administracion.html">Volver al manejador</a>
</body>
</html>