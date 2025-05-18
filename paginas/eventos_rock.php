<?php
include '../incluye/funciones.php';
redirigir_si_no_autenticado();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Eventos Rock - Zona Rockera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../recursos/estilos/estilo.css" />
    <style>
        .carousel-inner img {
            object-fit: cover;
            height: 400px;
        }

        .rock-carousel {
            margin-bottom: 60px;
            border: 3px solid #c62828;
            box-shadow: 0 8px 16px rgb(198 40 40 / 0.6);
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎤 Bienvenido al mundo del Rock, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
            <p>Explora los eventos más electrizantes y las noticias exclusivas del rock.</p>
            <a href="../salir.php" class="btn btn-rock">Cerrar sesión</a>
        </header>

        <!-- Carrusel de imágenes -->
        <div id="rockCarousel" class="carousel slide rock-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://media.istockphoto.com/id/2060725833/photo/hands-making-rock-sign-at-music-festival.jpg?s=1024x1024&w=is&k=20&c=KLfUbTVVpZ-DxTIF3GQvtQcdodwNJpZ4htvh3O016Cw=" class="d-block w-100" alt="Festival Rock del Fuego">
                </div>
                <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/2104421890/photo/close-up-of-a-musician-playing-the-electric-guitar-during-a-concert.jpg?s=1024x1024&w=is&k=20&c=2CEwKVa0eDzxZLEbp_YM_peFv-y19812z8B9urOHQNM=" class="d-block w-100" alt="Noche de Guitarras Eléctricas">
                </div>
                <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/1415623131/photo/empty-music-concert-stage-illuminated-by-spotlights-with-copy-space.jpg?s=1024x1024&w=is&k=20&c=VXub9ugC4EQjBeHgYfg5emYktgLTWI2xaeHQrWekOS4=" class="d-block w-100" alt="Tributo a los Clásicos">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#rockCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#rockCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <section>
            <h2>Próximos Eventos</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-rock p-4 h-100">
                        <h3>Festival Rock del Fuego 2025</h3>
                        <p><strong>Fecha:</strong> 15 de Agosto, 2025</p>
                        <p><strong>Lugar:</strong> Arena Metallica, Ciudad Rock</p>
                        <p>Disfruta de bandas legendarias y nuevas promesas del rock en un evento único.</p>
                        <a href="#" class="btn btn-rock">Más Info</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-rock p-4 h-100">
                        <h3>Noche de Guitarras Eléctricas</h3>
                        <p><strong>Fecha:</strong> 28 de Septiembre, 2025</p>
                        <p><strong>Lugar:</strong> Club Rock & Roll, Barrio Central</p>
                        <p>Una noche dedicada a los solos de guitarra que han marcado historia.</p>
                        <a href="#" class="btn btn-rock">Entradas</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-rock p-4 h-100">
                        <h3>Tributo a los Clásicos</h3>
                        <p><strong>Fecha:</strong> 10 de Octubre, 2025</p>
                        <p><strong>Lugar:</strong> Teatro Riffs, Ciudad Rock</p>
                        <p>Un homenaje a las bandas que hicieron vibrar al mundo con sus himnos.</p>
                        <a href="#" class="btn btn-rock">Reservar</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2>Noticias Rockeras</h2>
            <ul>
                <li>🔥 <strong>Nuevo álbum de "Los Rebeldes del Rock"</strong> saldrá este verano.</li>
                <li>🎸 La legendaria guitarra de "El Riff" será exhibida en el museo de rock local.</li>
                <li>🎤 Entrevista exclusiva con la voz detrás de la banda "Rockstone".</li>
            </ul>
        </section>

        <footer>
            <small>© 2025 Zona Rockera - Todos los derechos reservados.</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


