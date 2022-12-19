<?php
include('config.php');

if ($mysqli->connect_error) {
    echo " LO SENTIMOS, ESTE SITIO WEB ESTA EXPERIMENTANDO PROBLEMAS  <BR>";
    echo "error: Fallo al conectarse a mysql debido a:  " . $mysqli->connect_error . "<br>";

    exit();
} else {
    $leads = array();
    function allLeads($mysqli)
    {
        $sql = "SELECT * from leads";
        $result = mysqli_query($mysqli, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
            $leads[] = $rows;
        }
        return $leads;
    }

    if (isset($_POST['search'])) {
        $date1 = date("Y-m-d", strtotime($_POST['date1']));
        $date2 = date("Y-m-d", strtotime($_POST['date2']));

        $sql = "SELECT * from leads WHERE reg_date BETWEEN '$date1' AND '$date2'";
        $result = mysqli_query($mysqli, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
            $leads[] = $rows;
        }
    } else {
        $leads = allLeads($mysqli);
    }

} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads</title>
    <link rel="stylesheet" href="assets/css/record.css">
</head>

<body>
    <div class="header-container">
        <div class="header-record">
            <ul class="nav">
                <li><a href="logOut.php">Salir</a></li>
            </ul>
        </div>
        <div class="general-container">
            <h2>LEADS</h2>
            <form class="form-inline" method="POST" action="">
                <label>Fecha Desde:</label>
                <input type="date" class="form-control" placeholder="Start" name="date1" />
                <label>Hasta</label>
                <input type="date" class="form-control" placeholder="End" name="date2" />
                <button class="btn btn-primary" name="search"> Filtrar por fecha</button>
                <button class="btn btn-primary" name="remove"> Quitar filtro</button>
            </form>

            <div class="well-sm col-sm-12">
                <div class="btn-group pull-right">
                    <a href="export.php">Exportar Excel</a>
                </div>
            </div>
            <table id="" class="table table-striped table-bordered">
                <tr>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Nombre del lead</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">NIT</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Punto</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Equipo</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Ciudad</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Promotor</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">RTC</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Capitán</th>
                    <th width=150 style="color: #ffffff;" bgcolor="#5e1ca0">Fecha de registro</th>
                </tr>
                <tbody>
                    <?php foreach ($leads as $lead) { ?>
                    <tr>
                        <td>
                            <?php echo $lead['client_name']; ?>
                        </td>
                        <td>
                            <?php echo $lead['nit']; ?>
                        </td>
                        <td>
                            <?php echo $lead['place']; ?>
                        </td>
                        <td>
                            <?php echo $lead['team']; ?>
                        </td>
                        <td>
                            <?php echo $lead['city']; ?>
                        </td>
                        <td>
                            <?php echo $lead['promotor']; ?>
                        </td>
                        <td>
                            <?php echo $lead['RTC']; ?>
                        </td>
                        <td>
                            <?php echo $lead['captain']; ?>
                        </td>
                        <td>
                            <?php echo $lead['reg_date']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php

?>