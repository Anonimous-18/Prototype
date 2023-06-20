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
        $consulta = "INSERT INTO crearempleado (id, nombre, apellido, descripcion, puesto, departamento, proyecto) 
                     VALUES (:id, :nombre, :apellido, :descripcion, :puesto, :departamento, :proyecto)";
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
    <link rel="stylesheet" href="../css/VerEmpleado.css">
</head>

<body>
    <div class="portada">
        <img src="../img/portada.jpeg" alt="">
    </div>
    <

    <!-- Mostrar los empleados de la base de datos -->
    <center>
    <h2 style="color:blue">Lista de Empleados</h2>

    </center>
    <center>
        
    <table border="1" style="background-color:blue">
        <br>
        <tr style="background-color:black">
            <th >
                <br>
                <p style="color:aqua"> ID  </p>
                <br>
            </th> 
            <th>
                <br>
                <p style="color:aqua">Nombre</p>
                <br>
            </th> 
            <th>
                <br>
                <p style="color:aqua">Apellido</p>
                <br>
            </th>
            <th>
                <br>
                <p style="color:aqua">Descripción</p>
                <br>
            </th>
            <th>
                <br>
                <p style="color:aqua">Puesto</p>
                <br>
            </th>
            <th>
                <p style="color:aqua">Departamento</p>
            </th>
            <th>
                <p style="color:aqua">Proyecto</p>
            </th>
        </tr>
    </center>
    <center>
    <div>
            <button class="CrearEmpleado"></button> 
    </div>
    </center>

        <?php
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM crearempleado";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['puesto'] . "</td>";
            echo "<td>" . $row['departamento'] . "</td>";
            echo "<td>" . $row['proyecto'] . "</td>";
            echo "</tr>";
        }
        $conn = null; // Cerrar la conexión
        ?>
    </table>
    <br>
    <br>
    <button style="background-color:aqua"><a href="../php/submunu.php">Salir</a></button>

</body>

</html>
