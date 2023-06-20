<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $idempleado = $_POST['idempleado'];
    $nombreempleado = $_POST['nombreempleado'];
    $departamento = $_POST['departamento'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta de modificación
        $consulta = "UPDATE evaluacionescrear SET departamento = :departamento, descripcion = :descripcion, fecha = :fecha, ideempleado = :idempleado,nombreempleado = :nombreempleado WHERE id = :id";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':ideempleado', $idempleado);
        $statement->bindParam(':departamento', $departamento);
        $statement->bindParam(':nombreempleado', $nombreempleado);
        $statement->bindParam(':id', $id);
        $statement->execute();

        echo 'Evaluacion modificada exitosamente';
    } catch (PDOException $e) {
        echo 'Error al modificar la evaluacion: ' . $e->getMessage();
    }

    $conn = null; // Cerrar la conexión
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evaluaciones</title>
    <link rel="stylesheet" href="../css/CrearEmpleado.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    
    <div class="content">
        <form method="POST">
        <div>
                <h4>id  Evaluaciones  :</h4>
                <input type="text" name="id" require>
            </div>    
        <div>

        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" >
            </div>
       

    
            <div>
                <h4>Fecha:</h4> 
                <input type="text" name="fecha" >
            </div>

             <div>
                <h4>id Empleado:</h4> 
                <input type="text" name="idempleado" >
            </div>

             <div>
                <h4>Nombre  Empleado:</h4> 
                <input type="text" name="nombreempleado" >
            </div>
            <h4>  departameto  :</h4>
                <input type="text" name="departamento" require>
            </div>  
        </form>
        
    </div>
    <center>   
        
        <button type="submit" class="modificar" style="color: blueviolet;">Modificar</button>     
        <button class="salir"><a href="../php/submunu.php" style="color: aqua;">Salir</a></button>
    </center>
</body>
</html>
