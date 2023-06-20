<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $departamento = $_POST['departamento'];
    $descripcion = $_POST['descripcion'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO departamentocrear (id, descripcion, departamento) 
                     VALUES (:id, :descripcion, :departamento)";
        $statement = $conn->prepare($consulta);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':departamento', $departamento);
        $statement->execute();

        echo 'Departamento creado exitosamente';
    } catch (PDOException $e) {
        echo 'Error al insertar el departamento: ' . $e->getMessage();
    }

    $conn = null; // Cerrar la conexiónx
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/CrearDepartamento.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
            <form method="POST" action="CrearDepartamento.php">
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
                    <button class="salir" type="submit" style="color: aqua;">Salir</button>
                    <button class="departamentocrear" type="submit" style="color: rgb(23, 196, 226);">Crear</button>
                </div>
            </form>
        </div>
    </center>      
</body>
</html>

