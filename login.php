<?php
    $correo = $_POST["correo"];
    $password = $_POST["pass"];
    session_start();
    $_SESSION["correo"] = $correo;

    $conexion = mysqli_connect("localhost","root","","proyecto");
    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
    if ($filas) {
        header("location:administracion.html");
    } else {
    ?>
        <?php
        include("login_form.php");
        ?>
        <script type="text/javascript">alert('Error de autenticación.');</script>
    <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);