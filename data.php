<?php
$numero_telefono = "524491068251";

$nombres_productos = [
    "pastel piñata", "pastel mini", "pastel bluey", "cupcakes", 
    "pastel huellita", "pastel huellita", "pastel mini personalizado", "cupcakes",
    "pastel huella", "pastel nombre", "lasaña", "lasaña",
    "rosca de reyes", "pastel oblea", "pastel come galletas", "cupcakes",
    "pastel personalizadode conejo", "pastel de ángel", "de stitch",
    "pastel nombre", "pastel nombre", "pastel oblea", "pastel nombre",
    "pastel minion", "cupcakes", "cupcakes con pastel", "pastel jack", "pastel jack"
];

$productos = [];
for($i=1; $i<=28; $i++) {
    $nombre = $nombres_productos[$i-1] ?? "Producto $i";
    $productos[] = [
        'nombre' => ucwords($nombre),
        'descripcion' => "Delicioso " . $nombre . " hecho con ingredientes especiales para tu mascota.",
        'precio' => '$' . (20 + $i*5) . ' MXN',
        'imagen' => "/Pagina_nany/imagenes/Pastel{$i}.jpg"
    ];
}

// Banners mejorados con múltiples opciones y placeholders integrados
$banners = [
    [
        'imagen' => "/Pagina_nany/baners/Baner.gif",
        'alt' => "Pasteles especiales para mascotas",
        'titulo' => "¡Pasteles Únicos para tu Mascota!",
        'subtitulo' => "Ingredientes naturales y sabores irresistibles",
        'icono' => "fas fa-birthday-cake"
    ],
    [
        'imagen' => "/Pagina_nany/baners/15.gif", 
        'alt' => "Promociones especiales",
        'titulo' => "¡Ofertas Especiales!",
        'subtitulo' => "Descuentos en pasteles personalizados",
        'icono' => "fas fa-percent"
    ],
    [
        'imagen' => "/Pagina_nany/baners/cupcakes.jpg",
        'alt' => "Cupcakes para mascotas",
        'titulo' => "¡Cupcakes Deliciosos!",
        'subtitulo' => "Perfectos para celebraciones pequeñas",
        'icono' => "fas fa-cubes"
    ],
    [
        'imagen' => "/Pagina_nany/baners/personalizados.jpg",
        'alt' => "Pasteles personalizados",
        'titulo' => "¡Pasteles Personalizados!",
        'subtitulo' => "Diseños únicos para cada ocasión",
        'icono' => "fas fa-paint-brush"
    ]
];
?>