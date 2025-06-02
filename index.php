<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>NaniPet - Pastelería Canina Premium</title>
<link rel="stylesheet" href="estilo.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<script>
    // Bloqueo clic derecho y ctrl+u/s/c
    document.addEventListener("contextmenu", e => e.preventDefault());
    document.addEventListener("keydown", e => {
        if (e.ctrlKey && ['u','s','c'].includes(e.key.toLowerCase())) {
            e.preventDefault();
        }
    });

    // Toggle menú lateral
    function toggleMenu() {
        const menu = document.querySelector('.menu-lateral');
        const overlay = document.querySelector('.menu-overlay');
        const body = document.body;
        
        menu.classList.toggle('menu-abierto');
        overlay.classList.toggle('overlay-activo');
        body.classList.toggle('menu-bloqueado');
    }

    // Cerrar menú al hacer clic en overlay
    document.addEventListener('DOMContentLoaded', function() {
        const overlay = document.querySelector('.menu-overlay');
        overlay.addEventListener('click', toggleMenu);
        
        // Animar elementos al cargar
        const elementos = document.querySelectorAll('.tarjeta, .banner-container, .carrusel-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = Math.random() * 0.5 + 's';
                    entry.target.classList.add('animado');
                }
            });
        });
        
        elementos.forEach(el => observer.observe(el));
    });
</script>
</head>
<body>

<!-- Overlay para menú móvil -->
<div class="menu-overlay"></div>

<!-- Botón hamburguesa -->
<button class="menu-hamburguesa" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</button>

<!-- Menú lateral -->
<nav class="menu-lateral">
    <div class="menu-header">
        <div class="logo-menu">
            <img src="/Pagina_nany/imagenes/logonany.jpg" alt="NaniPet Logo" />
        </div>
        <button class="menu-cerrar" onclick="toggleMenu()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <ul class="menu-items">
        <li>
            <a href="index.php" class="activo">
                <i class="fas fa-home"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li>
            <a href="productos.php">
                <i class="fas fa-birthday-cake"></i>
                <span>Productos</span>
            </a>
        </li>
        <li>
            <a href="contacto.php">
                <i class="fas fa-envelope"></i>
                <span>Contacto</span>
            </a>
        </li>
    </ul>
    
    <div class="menu-footer">
        <p>Pastelería Premium para tu Mascota</p>
    </div>
</nav>

<!-- Contenido principal -->
<main class="contenido-principal">

    <!-- Header con logo grande y título -->
    <header class="header-logo">
        <div class="logo-container">
            <img src="/Pagina_nany/imagenes/logonany.jpg" alt="NaniPet Logo" />
            <div class="titulo-container">
                <h1>NaniPet</h1>
                <p class="subtitulo">Pastelería Canina Premium</p>
            </div>
        </div>
    </header>

    <!-- Banners con animación mejorados -->
    <section class="seccion-banners">
        <?php if (!empty($banners)): ?>
            <?php foreach (array_slice($banners, 0, 4) as $index => $banner): ?>
                <div class="banner-container">
                    <!-- Imagen real -->
                    <img src="<?= htmlspecialchars($banner['imagen']) ?>" 
                         alt="<?= htmlspecialchars($banner['alt']) ?>" 
                         class="banner" 
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                    
                    <!-- Placeholder que se muestra si la imagen no carga -->
                    <div class="banner-placeholder" style="display: none;">
                        <div class="placeholder-content">
                            <i class="<?= htmlspecialchars($banner['icono']) ?>"></i>
                            <h3><?= htmlspecialchars($banner['titulo']) ?></h3>
                            <p><?= htmlspecialchars($banner['subtitulo']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Banners por defecto si no hay ninguno definido -->
            <div class="banner-container">
                <div class="banner-placeholder" style="display: flex;">
                    <div class="placeholder-content">
                        <i class="fas fa-birthday-cake"></i>
                        <h3>¡Pasteles Únicos para tu Mascota!</h3>
                        <p>Ingredientes naturales y sabores irresistibles</p>
                    </div>
                </div>
            </div>
            <div class="banner-container">
                <div class="banner-placeholder" style="display: flex;">
                    <div class="placeholder-content">
                        <i class="fas fa-heart"></i>
                        <h3>¡Hechos con Amor!</h3>
                        <p>Cada pastel es único y especial</p>
                    </div>
                </div>
            </div>
            <div class="banner-container">
                <div class="banner-placeholder" style="display: flex;">
                    <div class="placeholder-content">
                        <i class="fas fa-percent"></i>
                        <h3>¡Ofertas Especiales!</h3>
                        <p>Descuentos en pedidos grandes</p>
                    </div>
                </div>
            </div>
            <div class="banner-container">
                <div class="banner-placeholder" style="display: flex;">
                    <div class="placeholder-content">
                        <i class="fas fa-star"></i>
                        <h3>¡Calidad Premium!</h3>
                        <p>Los mejores ingredientes para tu mascota</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <!-- Carrusel mejorado -->
    <section class="seccion-carrusel">
        <h2 class="seccion-titulo">Nuestras Especialidades</h2>
        <div class="carrusel-container">
            <div class="carrusel">
                <?php foreach (array_slice($productos, 0, 8) as $index => $p): ?>
                    <div class="carrusel-item">
                        <img src="<?= htmlspecialchars($p['imagen']) ?>" 
                             alt="<?= htmlspecialchars($p['nombre']) ?>" 
                             class="img-carrusel" 
                             loading="lazy"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <div class="img-placeholder" style="display: none;">
                            <i class="fas fa-birthday-cake"></i>
                            <span>Imagen</span>
                        </div>
                        <div class="carrusel-info">
                            <h3><?= htmlspecialchars($p['nombre']) ?></h3>
                            <span class="precio-mini"><?= htmlspecialchars($p['precio']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Cuadrícula de productos mejorada -->
    <section class="seccion-productos">
        <h2 class="seccion-titulo">Todos Nuestros Productos</h2>
        <div class="productos-grid">
            <?php foreach ($productos as $index => $p): ?>
                <div class="tarjeta">
                    <div class="imagen-container">
                        <img src="<?= htmlspecialchars($p['imagen']) ?>" 
                             alt="<?= htmlspecialchars($p['nombre']) ?>" 
                             loading="lazy"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <div class="img-placeholder" style="display: none;">
                            <i class="fas fa-birthday-cake"></i>
                            <span>Imagen del producto</span>
                        </div>
                        <div class="imagen-overlay">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="tarjeta-contenido">
                        <h3><?= htmlspecialchars($p['nombre']) ?></h3>
                        <p><?= htmlspecialchars($p['descripcion']) ?></p>
                        <div class="precio-container">
                            <span class="precio"><?= htmlspecialchars($p['precio']) ?></span>
                        </div>
                        <a class="btn-whatsapp"
                           href="https://wa.me/<?= $numero_telefono ?>?text=Hola%2C%20quiero%20informes%20del%20<?= urlencode($p['nombre']) ?>"
                           target="_blank" rel="noopener">
                            <i class="fab fa-whatsapp"></i>
                            Pedir por WhatsApp
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

</body>
</html>