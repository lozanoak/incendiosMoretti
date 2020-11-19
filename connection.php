<?php
//create connection
$conn = new mysqli('localhost','root','lozano.1990','incendios');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo ""; //conexión exitosa