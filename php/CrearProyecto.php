<?php

// Include the database connection file
include("db.php");

// Get the values from the form
$id = $_POST['id'];
$departamento = $_POST['departamento'];
$descripcion = $_POST['descripcion'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Try to insert the data into the database
    try {

        // Create a new connection to the database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the error mode to exceptions
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the SQL query
        $sql = "INSERT INTO proyectocrear(id, descripcion, departamento)
         VALUES (:id, :descripcion, :departamento)";

        // Prepare the statement
        $statement = $conn->prepare($sql);

        // Bind the parameters
        $statement->bindParam(':id', $id);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':departamento', $departamento);

        // Execute the statement
        $statement->execute();

        // Close the connection
        $conn = null;

        // Success message
        echo "¡Departamento y evaluación creados exitosamente!";

    } catch (PDOException $e) {

        // Error message
        echo "Error al insertar departamento y evaluación: " . $e->getMessage();

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/CrearEvaluaciones.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
        <form method="POST" action="CrearProyecto.php"> 

            <div>
                <h4> id : </h4> 
            <input type="text"  name="id" required>
            </div>
            <div>
                <h4> Departamento : </h4> 
            <input type="text"name="departamento" required>
            </div>
            <div>
                <h4> Descripcion  : </h4> 
            <input type="text"name="descripcion" required>
            </div>

        </div>
    </center>

    <center>
            
    <button class="salir" type="submit" style="color: aqua;">Salir</button>
    <button class="proyectocrear" type="submit" style="color: rgb(23, 196, 226);">Crear</button>
                
    </center>
      
</body>
</html>
