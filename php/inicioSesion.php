<?php
require('db.php');
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta de selección
        $consulta = "SELECT * FROM registro WHERE user = :usuario AND pass = :contrasena";
        $statement = $conn->prepare($consulta);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':contrasena', $contrasena);
        $statement->execute();

        if ($statement->rowCount() == 1) {
            echo 'Inicio de sesión exitoso';
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    } catch(PDOException $e) {
        echo 'Error al ejecutar la consulta: ' . $e->getMessage();
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
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/inicioSesion.css">
</head>
<body>
    <div class="div"> 
        <div class="img">
            <img src="../img/empresa.png" alt="">
        </div>
        <div class=" adentroDIV">
            <center>
                <h1>Inicio de sesión</h1>
                <form action="menu.php" method="POST">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required><br>

                    <input type="submit" value="Iniciar sesión">
                </form>
            </center> 
        </div>
    </div>
</body>
</html>
