<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: paginas/eventos_rock.php");
    exit;
}

// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "rock_usuarios";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $clave = $_POST['contrasena'];

    $consulta = $conexion->prepare("SELECT contrasena, nombre_usuario FROM usuarios WHERE correo = ?");
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $hash = $fila['contrasena'];
        $nombre_usuario = $fila['nombre_usuario'];

        if (password_verify($clave, $hash)) {
            $_SESSION['usuario'] = $nombre_usuario;
            header("Location: paginas/eventos_rock.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "No se encontró una cuenta con ese correo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión Rockero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="recursos/estilos/estilo.css">
    <style>
        .centrar-contenido {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="centrar-contenido">
        <div class="col-md-5">
            <header>
                <h1>🎸 Iniciar Sesión Rockero</h1>
                <p>Accede para vivir la experiencia del mejor rock</p>
            </header>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" id="correo" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                </div>
                <button type="submit" class="btn btn-rock w-100">Ingresar</button>
            </form>

            <div class="mt-3 text-center">
                <p>¿No tienes cuenta? <a href="registrarse.php" class="link-light text-decoration-underline">Regístrate</a></p>
            </div>
        </div>
    </div>
</body>
</html>

