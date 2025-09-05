<?php
// index.php
include 'config.php';

// Consulta para obtener los videojuegos
$stmt = $pdo->query("SELECT nombre, descripcion, imagen_url, precio FROM videojuegos LIMIT 10");
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎮 GameVault - Tu tienda de videojuegos</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">🎮 GameVault</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#juegos">Juegos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Carrusel -->
<div id="carouselJuegos" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1712066422210-8c18a254b55a?auto=format&fit=crop&w=1400&q=80" class="d-block w-100 carousel-img" alt="Elden Ring">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h2>Elden Ring</h2>
                <p>La Llama Primordial espera a su elegido.</p>
                <a href="#juegos" class="btn btn-lg btn-outline-light mt-3">Ver Juego</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1617654111654-cd8b30c6ba2c?auto=format&fit=crop&w=1400&q=80" class="d-block w-100 carousel-img" alt="God of War">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h2>God of War: Ragnarök</h2>
                <p>El destino de los nueve reinos está en juego.</p>
                <a href="#juegos" class="btn btn-lg btn-outline-light mt-3">Ver Juego</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1603032445646-58f8a5c7ef17?auto=format&fit=crop&w=1400&q=80" class="d-block w-100 carousel-img" alt="The Last of Us">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h2>The Last of Us Part I</h2>
                <p>Una historia de amor, pérdida y supervivencia.</p>
                <a href="#juegos" class="btn btn-lg btn-outline-light mt-3">Ver Juego</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1622878818405-3e2b0a064b6f?auto=format&fit=crop&w=1400&q=80" class="d-block w-100 carousel-img" alt="Spider-Man 2">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h2>Spider-Man 2</h2>
                <p>Dos héroes. Una ciudad. Una amenaza.</p>
                <a href="#juegos" class="btn btn-lg btn-outline-light mt-3">Ver Juego</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1639406512338-c3bfb3d3a508?auto=format&fit=crop&w=1400&q=80" class="d-block w-100 carousel-img" alt="GTA VI">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h2>GTA VI (Próximamente)</h2>
                <p>La era del crimen regresa... en 2025.</p>
                <a href="#" class="btn btn-lg btn-outline-light mt-3 disabled">Próximamente</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselJuegos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselJuegos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Sección de Videojuegos -->
<section id="juegos" class="games-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5" data-aos="fade-up">🎮 Nuestros Videojuegos</h2>
        <div class="row g-4">
            <?php if ($juegos): ?>
                <?php foreach ($juegos as $index => $juego): ?>
                    <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="game-card h-100 shadow-sm">
                            <div class="position-relative overflow-hidden">
                                <img src="<?= htmlspecialchars($juego['imagen_url']) ?>" 
                                     alt="<?= htmlspecialchars($juego['nombre']) ?>" 
                                     class="game-img w-100" 
                                     onerror="this.src='https://via.placeholder.com/300x170/1e1e1e/aaaaaa?text=Sin+Imagen';">
                                <div class="badge-price">$<?= number_format($juego['precio'], 2) ?></div>
                            </div>
                            <div class="game-info p-3">
                                <h5 class="game-title"><?= htmlspecialchars($juego['nombre']) ?></h5>
                                <p class="game-desc">
                                    <?= strlen($juego['descripcion']) > 120 ? 
                                       substr(htmlspecialchars($juego['descripcion']), 0, 120) . '...' : 
                                       htmlspecialchars($juego['descripcion']) ?>
                                </p>
                                <button class="btn btn-buy btn-sm w-100 mt-2">➕ Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center" data-aos="fade-up">
                    <p class="text-muted">No hay juegos disponibles en este momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4 text-muted">
    <div class="container">
        <p>&copy; 2025 GameVault. Todos los derechos reservados. | Hecho con 💜 para gamers.</p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });

    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>

</body>
</html>
