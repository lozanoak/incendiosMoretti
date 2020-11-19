<?php
$id=$_GET['id'];

require 'connection.php';

$sql="DELETE FROM datosingreso WHERE id='$id'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_query($conn,$sql)){
   header('Location:Reportes.php');
}else{
    echo "<p>No se borró</p>".$sql."<br>".mysqli_error($conn);
}

?>
