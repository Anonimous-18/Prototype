<?php
include("db.php");
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los puestos creados
    $consulta = "SELECT * FROM crearpuesto";
    $statement = $conn->prepare($consulta);
    $statement->execute();

    // Obtener los resultados de la consulta
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Cerrar la conexión
    $conn = null;

} catch (PDOException $e) {
    echo 'Error al obtener los puestos creados: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Puestos Creados</title>
    <link rel="stylesheet" href="../css/VerPuesto.css">
</head>
<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <br>
    <center>
        <div class="content">  
          
    <table border="1" style="background-color:black" class="table">
                <tr>
                    <th style="color:">ID</th>
                    <th style="color:aqua">Nombre</th>
                    <th style="color:aqua">Descripción</th>
                    <th style="color:aqua">ID Departamento</th>
                </tr>

                <?php
                foreach ($resultados as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>" . $row['iddepartamento'] . "</td>";
                    echo "</tr>";
                }
                ?>
                
            </table>
        </div>
    </center>   
    <br>
    <button> <a href="submenuPuesto.php" style="color:aqua" >volver</a></button>
   
</body>
</html>
