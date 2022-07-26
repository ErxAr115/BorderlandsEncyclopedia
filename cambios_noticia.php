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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/Logo_B.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borderlands Encyclopedia</title>
</head>
<body>
    <?php
        $link = Conectar();

        if($_POST) {
            $num = $_GET['id'];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $fecha = $_POST["fecha"];
            $contenido = $_POST["contenido"];
            $imagen = $_POST["imagen"];

            $queryUpdate = "UPDATE $tabla set titulo = '$titulo', autor = '$autor', fecha = '$fecha', contenido = '$contenido', imagen = '$imagen' where noticia_id = '$num'";

            $resultquery = mysqli_query($link, $queryUpdate);

            if($resultquery) {
                echo "<strong>Se actualizaron los registros con exito</strong>.<br>";
            } else {
                echo "No se actulizaron los registros.<br>";
            }
        }
    ?>
    <a href="administracion.html">Volver al manejador</a>
</body>
</html>