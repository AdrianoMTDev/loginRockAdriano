<?php
// --- Conexión a la base de datos ---
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "rock_usuarios";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre_usuario']);
    $correo = trim($_POST['correo']);
    $clave = $_POST['contrasena'];
    $confirmar_clave = $_POST['confirmar_contrasena'];
    $edad = (int)$_POST['edad'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $fecha_actual = new DateTime();
    $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
    $intervalo = $fecha_actual->diff($fecha_nacimiento_dt);
    $edad_calculada = $intervalo->y;

    if ($clave !== $confirmar_clave) {
        $error = "Las contraseñas no coinciden.";
    } elseif ($edad !== $edad_calculada) {
        $error = "La edad no coincide con la fecha de nacimiento.";
    } elseif ($edad < 13) {
        $error = "Debes tener al menos 13 años para registrarte.";
    } else {
        $clave_segura = password_hash($clave, PASSWORD_DEFAULT);

        $consulta = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, correo, contrasena, edad, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)");
        $consulta->bind_param("sssds", $nombre, $correo, $clave_segura, $edad, $fecha_nacimiento);

        if ($consulta->execute()) {
            header("Location: ingresar.php");
            exit;
        } else {
            $error = "Error al registrarse: " . $consulta->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registro Rockero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="recursos/estilos/estilo.css" />
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
        <div class="col-md-6">
            <header>
                <h1>🎸 Registro Rockero</h1>
                <p>Únete a la comunidad más potente del planeta 🎶</p>
            </header>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required />
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" id="correo" required />
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena" required />
                </div>
                <div class="mb-3">
                    <label for="confirmar_contrasena" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" name="confirmar_contrasena" id="confirmar_contrasena" required />
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" id="edad" required min="13" max="120" />
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required />
                </div>
                <button type="submit" class="btn btn-rock w-100">Registrarse</button>
            </form>

            <div class="mt-3 text-center">
                <p>¿Ya tienes cuenta? <a href="ingresar.php" class="link-light text-decoration-underline">Inicia sesión</a></p>
            </div>
        </div>
    </div>
</body>
</html>

