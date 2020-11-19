<?php
$fecha=$_POST['fecha'];
$temperatura=$_POST['temperatura'];
$humedad=$_POST['humedad'];
$velocidad=$_POST['velocidad'];
$sequia=$_POST['sequia'];

require 'connection.php';
include 'operaciones.php';

$objeto = new operaciones();
$resultado=$objeto->tIndices($temperatura,$humedad,$velocidad,$sequia);
$peligrosidad= $objeto->indicePeligrosidad($resultado);
$fondoc=$objeto->fondo($peligrosidad);

$sql="INSERT INTO datosingreso (fecha, temperatura, humedad, velocidad, dsequia)
VALUES ('$fecha', '$temperatura', '$humedad','$velocidad','$sequia')";
if (mysqli_query($conn,$sql)){ //Ejecución de la consulta que inserta el registro en la tabla ventaplanta
    echo '<script type="text/javascript">
         alert("Guardado");</script>'; //alerta que avisa que la venta se realizo
}else{
    echo "<p>No se puedo concretar</p>".$sql."<br>".mysqli_error($conn);
}



$lastid="SELECT LAST(id) FROM datosingreso";
$lastid=mysqli_insert_id($conn);
$insert="UPDATE datosingreso SET peligrosidad='$peligrosidad' WHERE id='$lastid'";
if (mysqli_query($conn,$insert)){
    echo "";
}else {
    echo "no agregado <br>". mysqli_error($conn);
}
?>
<html>
<head>
    <title>Guardar</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php echo $fondoc ?>
<div>
    <h1 align="center">Riesgo de ocurrencia:</h1>
    <br>
    <h2 align="center">  <?php echo $peligrosidad; ?></h2>
</div>
<div class="card-footer">
    <footer class="align-content-end">
        <h3 align="center"> <a href="index.html">Regresar</a></h3>
    </footer>
</div>
</body>
</html>


