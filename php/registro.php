<?php
require('db.php');
$servername = "localhost";
$dbname = "exame_java_12";
$username = "root";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $confirm_contrasena = $_POST['confirm_contrasena'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($contrasena != $confirm_contrasena) {
            echo 'Las contraseñas no coinciden';
        } else {
            // Consulta de inserción
            $consulta = "INSERT INTO registro (user, pass) VALUES (:usuario, :contrasena)";
            $statement = $conn->prepare($consulta);
            $statement->bindParam(':usuario', $usuario);
            $statement->bindParam(':contrasena', $contrasena);
            $statement->execute();

           // echo 'Registro insertado correctamente';
            header( 'Location: inicioSesion.php' ) ;

        }
    } catch(PDOException $e) {
        echo 'Error al insertar el registro: ' . $e->getMessage();
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
    <title>registrarse</title>
    <link rel="stylesheet" href="../css/inicioSesion.css">
</head>
<body>
    <div class="div"> 
        <div class="imagen">
            <img src="../img/portada.jpeg" alt=" ">
        </div>
        <div class=" adentroDIV">
            <center>
                <h1>registrarse</h1>
                <!-- action="inicioSesion.php"-->
                <form  method="POST">
                    <label for="usuario">Usuario:</label>
                    <input type="text"  name="usuario" required><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password"  name="contrasena" required><br>
                    
                    <label for="confirm_contrasena">Confirmar Contraseña:</label>
                    <input type="password"  name="confirm_contrasena" required><br>

                    <input type="submit"  name="registro" value="registrarse">
                </form>
            </center> 
        </div>
    </div>
</body>
</html>
