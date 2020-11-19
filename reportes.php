<?php
require 'connection.php';
$where="";
if (!empty($_POST)){
    $valor=$_POST['buscar'];
    if(!empty($valor)){
        $where="WHERE peligrosidad='$valor'";
    }
}
$sql="SELECT * FROM datosingreso $where"; //mostrar historial
$resultado= mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <Title>Reportes</Title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <h2 style="text-align: center">Historial</h2>
    </div>

    <br class="row">

    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <b>Peligrosidad: </b><input type="text" id="buscar" name="buscar">
        <input type="submit" class="btn btn-info" id="enviar" name="enviar" value="Buscar">
    </form>
</div>
<br>
<div class="col-auto">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Temperatura</th>
            <th>Humedad</th>
            <th>Velocidad</th>
            <th>Días Sequia</th>
            <th>Peligrosidad</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fecha'];?></td>
                <td><?php echo $row['temperatura'];?></td>
                <td><?php echo $row['humedad'];?></td>
                <td><?php echo $row['velocidad'];?></td>
                <td><?php echo $row['dsequia'];?></td>
                <td><?php echo $row['peligrosidad'];?></td>
                <td><a href="modificar.php?id=<?php echo $row['id'];?>">
                    <span class="btn btn-primary">Modificar</span> </a></td>
                <td><a href="eliminar.php?id=<?php echo $row['id'];?>">
                        <span class="btn btn-primary">Eliminar</span> </a></td>
            </tr>
       <?php }?>
        </tbody>
    </table>
</div>
<div class="row" align="center">
    <h3><a href="index.html">Página Principal</a></h3>
</div>
</body>
</html>
