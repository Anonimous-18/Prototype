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

    $conn = null; // Cerrar la conexión
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link rel="stylesheet" href="../css/CrearDepartamento.css">
</head>

<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
        
    </center>

    <!-- Mostrar los departamentos de la base de datos -->
    <h2>Lista de Departamentos</h2>
    
    <table border="1" style="background-color:black">
        <tr>
            <th style="color:rgb(255, 255, 255)"> <p>ID</p></th>
            <th style="color:aqua">Departamento</th>
            <th style="color:aqua">Descripción</th>
        </tr>
        <?php
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM departamentocrear";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        

        foreach ($rows as $row) {
            echo "<tr>" . $row['departamento'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>". $row['descripcion'] . "</td>";
        } 
        ?>
        
    </table>
        
        