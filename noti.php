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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/noti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="img/Logo_B.png">
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
        $num = $_GET["id"];
        $registros = mysqli_query($link, "SELECT * FROM noticias where noticia_id = $num");
        $row = mysqli_fetch_assoc($registros);

        echo "<h1 class='titulo'>$row[titulo]</h1>";
        echo "<h3 class='autor'>Autor: $row[autor]</h3>";
        echo "<h3 class='fecha'>Fecha: $row[fecha]</h3>";
        echo "<p class='contenido'>$row[contenido]</p>";
        echo "<img src=$row[imagen] class='imagen'>"
    ?>

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