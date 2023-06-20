<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener las evaluaciones
    $consulta = "SELECT * FROM evaluacionescrear";
    $statement = $conn->prepare($consulta);
    $statement->execute();

    // Obtener los resultados de la consulta
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Cerrar la conexión
    $conn = null;

} catch (PDOException $e) {
    echo 'Error al obtener las evaluaciones: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Evaluaciones</title>
    <link rel="stylesheet" href="../css/CrearDepartamento.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
            <table border="1" style="background-color:black">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Departamento</th>
                    <th>Fecha</th>
                    <th>ID Empleado</th>
                    <th>Nombre del Empleado</th>
                </tr>

                <?php
                foreach ($resultados as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>" . $row['departamento'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['idempleado'] . "</td>";
                    echo "<td>" . $row['nombreempleado'] . "</td>";
                    echo "</tr>";
                }
                ?>
                
            </table>
        </div>
    </center>      
</body>
</html>
