<?php

include 'conexion.php';

$conexion = mysqli_connect($servidor, $usuario, $clave, $db);

// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to check if the email already exist
$checkuser = "SELECT * FROM $tdb1 WHERE ced = '$_POST[ced]' ";

// Variable $result hold the connection data and the query
$result = $conexion-> query($checkuser);

// Variable $count hold the result of the query
$count = mysqli_num_rows($result);

	
	// If count == 1 Este correo ya esta registrado en la base de datos
	if ($count == 1) {
        echo 'El inquilino ya se encuentra registrado, puede hacer click en CONSULTAS y verificar su estado.';
        header("Location:mensaje.html");
        } else {	
        
        /*
        If the email don't exist, the data from the form is sended to the
        database and the account is created
        */
        $name = $_POST['name'];
        $cedula = $_POST['ced'];
        $tipo = $_POST['tipo'];
        $comen = $_POST['comen'];
       
        
        // Query to send Name, Email and Password hash to the database
        $query = "INSERT INTO $tdb1 (name, ced, tipo, comen) VALUES ('$name', '$cedula', '$tipo', '$comen')";
    
        if (mysqli_query($conexion, $query)) {
            echo 'El inquilino ha sido ingresado correctamente a la base de datos';
            header("Location:correcto.html");		
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conexion);
            }	
        }	
        mysqli_close($conexion);
  


?>


