<?php
header("Content-Type:application/json");
include('config.php');

$current_date = date('Y-m-d H:i:s');
$data = json_decode(file_get_contents("php://input"));
$name = $data->client_name;
$nit = $data->nit;
$place = $data->point_name;
$team = $data->team_name;
$city = $data->city_name;
$promotor = $data->promotor;
$rtc = $data->rtc;
$captain = $data->captain;
$checked = $data->checkbox;
$ip = $data->ip;
$hour = $data->hour;
$date = $data->date;
$current_date = $date . ' ' . $hour;

$result = mysqli_query($mysqli, "INSERT INTO leads(client_name, nit, place, team, city, promotor, RTC, captain, terms, ip, reg_date) VALUES('$name','$nit','$place', '$team', '$city', '$promotor', '$rtc', '$captain', '$checked', '$ip', '$current_date') ");

response($name, $nit, $current_date);

function response($name, $nit, $current_date)
{
  $response['name'] = $name;
  $response['nit'] = $nit;
  $response['current_date'] = $current_date;

  $json_response = json_encode($response);
  echo $json_response;
}

