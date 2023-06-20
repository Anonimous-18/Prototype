<?php

// Include the database connection file
include("db.php");

// Get the values from the form
//
$id = $_POST['id'];
$departamento = $_POST['departamento'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$idempleado = $_POST['idempleado'];
$nombreempleado = $_POST['nombreempleado'];
//


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Try to insert the data into the database
    try {

        // Create a new connection to the database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the error mode to exceptions
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the SQL query
        //
        $sql = "INSERT INTO evaluacionescrear(id, descripcion, departamento, fecha, idempleado, nombreempleado)
         VALUES (:id, :descripcion, :departamento, :fecha, :idempleado, :nombreempleado)";
         //

        // Prepare the statement
        $statement = $conn->prepare($sql);

        // Bind the parameters
        //
        $statement->bindParam(':id', $id);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':departamento', $departamento);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':idempleado', $idempleado);
        $statement->bindParam(':nombreempleado', $nombreempleado);
        //

        // Execute the statement
        $statement->execute();

        // Close the connection
        $conn = null;

        // Success message
        echo " evaluacion creada exitosamente";

    } catch (PDOException $e) {

        // Error message
        echo "Error al insertar evaluacion: " . $e->getMessage();

    }

}

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear  Evaluacion</title>
    <link rel="stylesheet" href="../css/CrearDepartamento.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
            <form method="POST" action="CrearEvaluaciones.php"> //
                <div>
                    <h4>id:</h4>
                    <input type="text"  name="id" required>
                </div>
                <div>
                    <h4>Departamento:</h4> 
                    <input type="text"  name="departamento" required>
                </div>
                <div>
                    <h4>Descripcion:</h4> 
                    <input type="text" name="descripcion" required>
                </div>
                <div>
                    <h4>Fecha:</h4> 
                    <input type="date" name="fecha" required>
                </div>
                <div>
                    <h4>Id Empleado:</h4> 
                    <input type="text" name="idempleado" required>
                </div>
                <div>
                    <h4>Nombre del Empleado:</h4> 
                    <input type="text"  name="nombreempleado" required>
                </div>
                
                <div>  
                      
                    <button class="salir" type="submit" style="color: aqua;">Salir</button>
                    <button class="evaluacionescrear" type="submit" style="color: rgb(23, 196, 226);">Crear</button>
                </div>
            </form>
        </div>
    </center>      
</body>
</html>
