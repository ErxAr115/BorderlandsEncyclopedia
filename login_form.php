<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_B.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Borderlands Encyclopedia</title>
</head>
<body>
    <div class="contenedor">
        <div class="title"><span>Inicio de sesión</span></div>

        <form action="login.php" method="post">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="correo" placeholder="Correo Electronico" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div>
            <div class="row button">
                <input type="submit" value="Ingresar" class="boton">
            </div>
        </form>
    </div>
</body>
</html>