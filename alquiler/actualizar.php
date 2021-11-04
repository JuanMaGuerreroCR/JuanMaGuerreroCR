<?php


include 'conexion.php';

$conexion = mysqli_connect($servidor, $usuario, $clave, $db);

// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['id'];
$come = $_POST['comen'];


$actualizar = "UPDATE $tdb1 SET comen='$come' WHERE id_persona = '$id'";
$resultado=mysqli_query($conexion, $actualizar);

if($resultado){

    
header("LOCATION:listo");



} else {

echo"<script>alert(' No se pudo añadir el comentario'); window.history.go(-1);</script>";

}


