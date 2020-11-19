<?php
require 'connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM datosingreso WHERE id = '$id'";
$resultado = mysqli_query($conn,$sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<h1 align="center">Modificar</h1>
<div class="container-sm align-content-center">
<div class="form-group">
<form name="modificación" action="update.php" method="post"> <!--metodo de post-->

    <label>ID:</label> <!--Creación de etiquetas y cuadros de texto-->
    <input class="form-control" type="number" name="id" VALUE="<?php echo $row['id'];?>" readonly/>
    <label>Fecha:</label>
    <input class="form-control" name="fecha" VALUE="<?php echo $row['fecha'];?>" readonly/>
    <label>Temperatura:</label>
    <input class="form-control" type="number" name="temperatura"  VALUE="<?php echo $row['temperatura'];?>" required>
    <label>Humedad: </label>
    <input class="form-control" type="number" name="humedad" VALUE="<?php echo $row['humedad'];?>"required>
    <label>Velocidad:</label>
    <input class="form-control" type="number" name="velocidad" VALUE="<?php echo $row['velocidad'];?>"required/>
    <label>Días de sequía:</label>
    <input class="form-control" type="number" name="sequia" VALUE="<?php echo $row['dsequia'];?>"required/>
    <label>Peligrosidad:</label>
    <input class="form-control" type="text" name="peligrosidad" VALUE="<?php echo $row['peligrosidad'];?>"required readonly/>
    <br>
    <input  class="btn btn-info" type="submit" value="Guardar"/>
    <button class="btn btn-info"><a href="reportes.php">Regresar</a></button>
</form>
</div>
</div>
</body>
</html>