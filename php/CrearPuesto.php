<?php

// Include the database connection file
include("db.php");

// Get the values from the form
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$iddepartamento = $_POST['iddepartamento'];
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
        $sql = "INSERT INTO crearpuesto(id, descripcion, iddepartamento ,nombre)
         VALUES (:id, :descripcion, :iddepartamento, :nombre)";

        // Prepare the statement
        $statement = $conn->prepare($sql);

        // Bind the parameters
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':iddepartamento', $iddepartamento);
       

        // Execute the statement
        $statement->execute();

        // Close the connection
        $conn = null;

        // Success message
        echo "¡puesto creado exitosamente!";

    } catch (PDOException $e) {

        // Error message
        echo "Error al insertar puesto: " . $e->getMessage();

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
    <link rel="stylesheet" href="../css/CrearPuesto.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
        <form method="POST" action="CrearPuesto.php"> 

            <div>
                <h4> id : </h4> 
            <input type="text" name="id">
            </div>
            <div>
                <h4> Nombre  : </h4> 
            <input type="text"  name="nombre">
            </div>
            <div>
                <h4> Descripcion : </h4> 
            <input type="text" name="descripcion">
            </div>
      
       
            <div>
                <h4>id  Departamento  : </h4> 
            <input type="text"  name="iddepartamento">
            </div>
       
        
            

        </div>
    </center>

    <center>   
                    
    <button class="sal" type="submit" style="color: aqua;">Salir</button>

    <button class="crearpuesto" type="submit" style="color: rgb(23, 196, 226);">Crear</button>
                
    </center>
    </center>
      
</body>
</html>