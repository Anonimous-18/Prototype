<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $iddepartamento = $_POST['iddepartamento'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta de modificación
        $consulta = "UPDATE crearpuesto SET descripcion = :descripcion,  iddepartamento = :iddepartamento, nombre = :nombre WHERE id = :id";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':iddepartamento', $iddepartamento);
        $statement->bindParam(':id', $id);
        $statement->execute();

        echo 'puesto modificado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al modificar el puesto: ' . $e->getMessage();
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
    <title>Modificar puesto</title>
    <link rel="stylesheet" href="..ModificarPuesto">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    
    <div class="content">
        <form method="POST">
        <div>
                <h4>id puesto :</h4>
                <input type="text" name="id" require>
            </div>    
        <div>

        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" >
            </div>
       

    
            <div>
                <h4>nombre:</h4> 
                <input type="text" name="nombre" >
            </div>
            <div>
                <h4>id departamento :</h4> 
                <input type="text" name="iddepartamento" >
            </div>
        </form>
    </div>

    <center>
        <div>     
                
            <button type="submit" class="modificar"style="">Modificar</button> 
            <button class="salir"><a href="../php/submunu.php" style="color: aqua;">Salir</a></button>
        </div>
    </center>
</body>
</html>