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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_B.png">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/noticias.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Borderlands Encyclopedia</title>
</head>
<body>
<div class="header">
        <div class="cont-logo">
            <img src="img/Logo_B.png" class="logo">
            <p>Borderlands Encyclopedia</p>
        </div>
        <nav>
            <ul class="links">
                <li><a href="index.html" class="nav-link">Inicio</a></li>
                <li><a href="historia.html" class="nav-link">Historia</a></li>
                <li><a href="noticias.php" class="nav-link">Noticias</a></li>
                <li><a href="#" class="nav-link">Guías</a></li>
                <li><a href="login_form.php" class="nav-link">Login</a></li>
            </ul>
        </nav>
    </div>

    <?php
        $link = Conectar();
        $registros = mysqli_query($link, "SELECT * FROM noticias");
    ?>

    <div class="contenedor">
    <?php

        while (list($id, $titulo, $autor, $fecha, $contenido, $imagen) = mysqli_fetch_array($registros)) {
            echo "<div class='card'>";
            echo "<img src=$imagen>";
            echo "<h4>$titulo</h4>";
            echo "<p>$autor</p>";
            echo "<p>$fecha</p>";
            echo "<a href=noti.php?id=$id>Leer más</a>";
            echo "</div>";
        }
    ?>
    </div>

    <section class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-snapchat"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>

        <ul class="list">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="historia.html">Historia</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="#">Guías</a></li>
            <li><a href="login_form.php">Login</a></li>
        </ul>
        <p class="copyright">
            Borderlands Encyclopedia @ 2022
        </p>
    </section>
</body>
</html>