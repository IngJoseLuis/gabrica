<?php
include('config.php');
if ($mysqli->connect_error) {
    echo "LO SENTIMOS, ESTE SITIO ESTA PRESENTANDO PROBLEMAS";
    exit();
} else {
    $ip_user = $_POST["ip"];
    $hour = $_POST["hour"];
    $date = $_POST["date"];
    $name = $_POST["user_name"];
    $nit = $_POST["nit"];
    $place = $_POST["point_name"];
    $team = $_POST["team_name"];
    $city = $_POST["city_name"];
    $promotor = $_POST["promotor"];
    $rtc = $_POST["rtc"];
    $captain = $_POST["captain"];
    $checked = $_POST["cbox"];
    $current_date = $date . ' ' . $hour;
    if (($name != "") && ($nit != "") && ($checked != "")) {
        $sqlEmpleaados = mysqli_query($mysqli, "INSERT INTO leads(client_name, nit, place, team, city, promotor, RTC, captain, terms, ip, reg_date) VALUES('$name','$nit','$place', '$team', '$city', '$promotor', '$rtc', '$captain', '$checked','$ip_user', '$current_date') ");
        header('Location: ../pages/thanks.html');
    }
    $mysqli->close();
    exit();
}