<?php

require 'connection.php';
include 'operaciones.php';

$id=$_POST['id'];
$fecha=$_POST['fecha'];
$temperatura=$_POST['temperatura'];
$humedad=$_POST['humedad'];
$velocidad=$_POST['velocidad'];
$sequia=$_POST['sequia'];

$objeto = new operaciones();
$resultado=$objeto->tIndices($temperatura,$humedad,$velocidad,$sequia);
$peligrosidad= $objeto->indicePeligrosidad($resultado);
$fondoc=$objeto->fondo($peligrosidad);



$sql="UPDATE datosingreso SET temperatura='$temperatura', humedad='$humedad',
velocidad='$velocidad', dsequia='$sequia', peligrosidad='$peligrosidad' WHERE id='$id'";
if (mysqli_query($conn,$sql)){ //Ejecución de la consulta que actualiza el registro
    echo '<script type="text/javascript">
         alert("Actualizado");</script>'; //alerta que avisa el registro se actualizo
}else{
    echo "<p>No se puedo concretar</p>".$sql."<br>".mysqli_error($conn);
}
?>
<html>
<head>
    <title>Actualizar</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php echo $fondoc?>
<div>
    <h1 align="center">Riesgo de ocurrencia:</h1>
    <br>
    <h2 align="center">  <?php echo $peligrosidad; ?></h2>
</div>
<div class="card-footer">
    <footer class="align-content-end">
        <h3 align="center"> <a href="reportes.php">Regresar</a></h3>
    </footer>
</div>
</body>
</html>