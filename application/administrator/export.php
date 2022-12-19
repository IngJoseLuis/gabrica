<?php

include('config.php');

if ($mysqli->connect_error) {
    echo " LO SENTIMOS, ESTE SITIO WEB ESTA EXPERIMENTANDO PROBLEMAS  <BR>";
    echo "error: Fallo al conectarse a mysql debido a:  " . $mysqli->connect_error . "<br>";
    exit;
} else {

    $sql = "SELECT * from leads";
    $result = mysqli_query($mysqli, $sql);
    $leads = array();
    while ($rows = mysqli_fetch_assoc($result)) {
        $leads[] = $rows;
    }

    if (!empty($leads)) {
        $filename = "leads.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);

        $mostrar_columnas = false;

        foreach ($leads as $lead) {
            if (!$mostrar_columnas) {
                echo implode("\t", array_keys($lead)) . "\n";
                $mostrar_columnas = true;
            }
            echo implode("\t", array_values($lead)) . "\n";
        }

    } else {
        echo 'No hay datos a exportar';
    }

    mysqli_close($mysqli);

} ?>