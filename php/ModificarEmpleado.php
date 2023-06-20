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
        
        // Consulta de modificación
        $consulta = "UPDATE crearempleado SET nombre = :nombre, apellido = :apellido, descripcion = :descripcion, puesto = :puesto, departamento = :departamento, proyecto = :proyecto WHERE id = :id";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':puesto', $puesto);
        $statement->bindParam(':departamento', $departamento);
        $statement->bindParam(':proyecto', $proyecto);
        $statement->bindParam(':id', $id);
        $statement->execute();

        echo 'Empleado modificado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al modificar el empleado: ' . $e->getMessage();
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
    <title>Modificar Empleado</title>
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
                <h4>id  :</h4>
                <input type="text" name="id" require>
            </div>    
        <div>
                <h4>Nombre Empleado:</h4>
                <input type="text" name="nombre" >
            </div>
       
            <div>
                <h4>Apellido:</h4> 
                <input type="text" name="apellido" >
            </div>
        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" >
            </div>
       
            <div>
                <h4>Puesto:</h4> 
                <input type="text" name="puesto" >
            </div>
    
            <div>
                <h4>Departamento:</h4> 
                <input type="text" name="departamento" >
            </div>

            <div>
                <h4>Proyecto:</h4> 
                <input type="text" name="proyecto" >
            </div>
            
        </form>
    </div>

    <center>
        <div>      
            
            <button type="submit" class="modificar">Modificar</button>
            <button class="salir"><a href="../php/submunu.php" style="color: aqua;">Salir</a></button>
        </div>
    </center>
</body>
</html>
