<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $descripcion = $_POST['descripcion'];
    $puesto = $_POST['puesto'];
    $departamento = $_POST['departamento'];
    $proyecto = $_POST['proyecto'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta de inserción
        $consulta = "INSERT INTO crearempleado (id,nombre, apellido, descripcion, puesto, departamento, proyecto) 
                     VALUES (:id,:nombre, :apellido, :descripcion, :puesto, :departamento, :proyecto)";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':puesto', $puesto);
        $statement->bindParam(':departamento', $departamento);
        $statement->bindParam(':proyecto', $proyecto);
        $statement->execute();

        echo 'Empleado creado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al insertar el empleado: ' . $e->getMessage();
    }

    $conn = null; // Cerrar la conexión
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
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
                <h4>id:</h4>
                <input type="text" name="id" required>
            </div>    
        <div>
                <h4>Nombre Empleado:</h4>
                <input type="text" name="nombre" required>
            </div>
       
            <div>
                <h4>Apellido:</h4> 
                <input type="text" name="apellido" required>
            </div>
        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" required>
            </div>
       
            <div>
                <h4>Puesto:</h4> 
                <input type="text" name="puesto" required>
            </div>
    
            <div>
                <h4>Departamento:</h4> 
                <input type="text" name="departamento" required>
            </div>

            <div>
                <h4>Proyecto:</h4> 
                <input type="text" name="proyecto" required>
            </div>
        </form>
    </div>

    <center>
        <div>  
            <button type="submit" class="CrearEmpleado">Crear</button> 
            <button class="salir"><a href="../php/submunu.php" style="color: aqua;">Salir</a></button>
            <button class="CrearEmpleado"></button> 
        </div> </center>
    </body>
</html>
