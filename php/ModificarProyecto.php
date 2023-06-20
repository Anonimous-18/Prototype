<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $departamento = $_POST['departamento'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta de modificación
        $consulta = "UPDATE proyectocrear SET descripcion = :descripcion, departamento = :departamento WHERE id = :id";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':departamento', $departamento);
        $statement->bindParam(':id', $id);
        $statement->execute();

        echo 'proyecto modificado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al modificar el proyecto: ' . $e->getMessage();
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
    <title>Modificar proyecto</title>
    <link rel="stylesheet" href="">
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

        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" >
            </div>
       

    
            <div>
                <h4>Departamento:</h4> 
                <input type="text" name="departamento" >
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