<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,pass,email) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            header('Location: login.php');
            ;
        } else {
            echo '<script>alert("El registro ha fallado. Inténtelo más tarde.")</script>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="login">
    <div id="header">
        <ul class="nav">
            <li><a href="login.php">Login</a></li>
            <li><a href="../landing/index.html">Landing</a></li>
        </ul>
    </div>
    <section class="login-content">
        <h1>REGISTRO NUEVO USUARIO</h1>
        <form method="post" action="" name="signup-form" class="form-login">
            <div class="form-element">
                <label>Nombre de Usuario</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
                <label>Correo Electrónico</label>
                <input type="email" name="email" required />
            </div>
            <div class="form-element">
                <label>Contraseña</label>
                <input type="password" name="password" required />
            </div>
            <div class="button">
                <button type="submit" name="register" value="register" class="button2">REGISTRARSE</button>
            </div>
        </form>
    </section>
</body>

</html>