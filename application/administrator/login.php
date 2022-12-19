<?php

include('config.php');
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['pass'])) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: records.php');
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="login">
    <div id="header">
        <ul class="nav">
            <li><a href="register.php">Registro</a></li>
            <li><a href="../landing/index.html">Landing</a></li>
        </ul>
    </div>
    <section class="login-content">
        <h1>INGRESE AL SISTEMA</h1>
        <form method="post" action="" name="signin-form" class="form-login">
            <div class="form-element">
                <label>Nombre de Usuario</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
                <label>Contraseña</label>
                <input type="password" name="password" required />
            </div>
            <div class="button">
                <button class="button2" type="submit" name="login" value="login">INGRESAR</button>
            </div>
        </form>
    </section>
</body>

</html>