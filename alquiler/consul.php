<!DOCTYPE html>
<html>
	<head>

    <style>
h2 {
	text-transform: uppercase;
	font-size: 25px;
	font-family: "Montserrat-Bold";
	text-align: center;
	margin-bottom: 12px;
}

table td{

padding: 0.30rem 0.30rem;
}

table, td, th {
  border: 2px solid white;
}

table {
  border-collapse: collapse;
  width: 100%;
}


td {
  text-align: center;
  font-size: medium;
}


@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    
    font-size: .5em;
    text-align: center;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: center;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
	h2 {
		font-size: 28px;
	}
  

}


</style>

		<meta charset="utf-8">
		<title>Consulta</title>
        <link href="alquiler.ico" type="image/x-icon" rel="shortcut icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
        
        
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
            <h3>Información</h3>

            <div>
        <table>
        <tr>
            <td>Nombre</td>
            <td>Cédula</td>
            <td>Tipo</td>
            <td>Comentario</td>
            <td>Agregar Comentario</td>
        </tr>
            

            

<?php

include 'conexion.php';

$conexion = mysqli_connect($servidor, $usuario, $clave, $db);

// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

	

if(isset($_POST['consultar']))
{
    // Query to check if the email already exist
$checkuser = "SELECT * FROM $tdb1 WHERE ced = '$_POST[ced]' ";

// Variable $result hold the connection data and the query
$result = $conexion-> query($checkuser);

// Variable $count hold the result of the query
$count = mysqli_num_rows($result);

	
	// If count == 1 Este correo ya esta registrado en la base de datos
	if ($count == 0) {
        echo 'La persona no se encuentra registrada como inquilino.';
        header("Location:noregis");
        } else {

    $cedula = $_POST['ced'];
    

    $resultados = mysqli_query($conexion, "SELECT * FROM $tdb1 WHERE ced = $cedula");
    while($consulta = mysqli_fetch_array($resultados))
    {
        
      ?>
      
        <tr>
            <td><?php echo $consulta['name']?></td>
            <td><?php echo $consulta['ced']?></td>
            <td><?php echo $consulta['tipo']?></td>
            <td><?php echo $consulta['comen']?></td>       
            
            <td><a href="edit.php?id=<?php echo $consulta['id_persona'];?>"><i class="bi bi-pen" style="color: white;"></i></a></td> 
        </tr>   
       
       
       
        <?php
    }
}
        }
?>

</table>

        </div>
     
<p></p>      


<a href="consulta"><button type="button">VOLVER <i class="zmdi"></i>
                    </button></a>
</div>
		</div>
	</body>
</html>