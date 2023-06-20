<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta de inserción
        $consulta = "DELETE FROM departamentocrear WHERE id = :id";
        $statement = $conn->prepare($consulta);      
        $statement->bindParam(':id', $id);
        $statement->execute();

        echo 'departamento eliminado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al eliminar el departamento: ' . $e->getMessage();
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
    <title>Eliminar departamento</title>
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
        
            <div>
                <h4>Descripción:</h4> 
                <input type="text" name="descripcion" >
            </div>

    
            <div>
                <h4>Departamento:</h4> 
                <input type="text" name="departamento" >
        </form>
    </div>

    <center>
        <div>      
                
            <button type="submit" class="eliminar">eliminar</button>
            <button class="salir"><a href="../php/submunu.php" style="color: aqua;">Salir</a></button>
            <button class="eliminar"></button> 
        </div> </center>
    </body>
</html>