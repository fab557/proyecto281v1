<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Mi Sitio Web') ?></title>
    
    <!-- Estilos de Bootstrap y Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        /* Estilos generales */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Mínima altura para ocupar toda la pantalla */
            padding-top: 90px; /* Aumentar el espacio del header */
            background-color: #f0f4f8; /* Color de fondo suave */
            font-family: Arial, sans-serif; /* Fuente general */
        }

        /* Estilos del sidebar */
        .sidebar {
            height: 100vh; /* Altura completa */
            position: fixed; /* Fijo a la izquierda */
            top: 90px; /* Ajustar para que coincida con el padding del header */
            left: 0;
            width: 250px; /* Ancho del menú */
            background-color: #ff6f61; /* Color vibrante para el menú */
            color: white; /* Color de texto blanco */
            padding: 15px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2); /* Sombra más suave */
            transition: all 0.3s; /* Transición suave */
        }

        /* Encabezado del sidebar */
        .sidebar h4 {
            color: #ffffff; /* Color del encabezado */
            text-align: center; /* Centrar el encabezado */
            font-size: 1.5rem; /* Tamaño de fuente más grande */
            margin-bottom: 20px; /* Espacio debajo del encabezado */
        }

        /* Estilos de los enlaces del sidebar */
        .sidebar .nav-link {
            color: #ffffff; /* Color de texto de los enlaces */
            font-size: 1.2rem; /* Tamaño de fuente más grande para los enlaces */
            padding: 10px; /* Padding adicional para los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            transition: background-color 0.3s; /* Transición suave para el hover */
        }

        /* Efecto al pasar el ratón sobre los enlaces */
        .sidebar .nav-link:hover {
            background-color: #e95e2b; /* Color al pasar el ratón */
        }

        /* Estilos del contenido principal */
        .content {
            margin-left: 260px; /* Espacio para el menú lateral */
            padding: 30px; /* Padding más amplio para el contenido */
            flex: 1; /* Permite que el contenido crezca */
            background-color: #ffffff; /* Color de fondo blanco */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para el contenido */
            transition: all 0.3s; /* Transición suave */
        }

        /* Estilos del footer */
        footer {
            background-color: #343a40; /* Color del fondo del footer */
            color: white; /* Color del texto del footer */
            text-align: center; /* Centrar el texto */
            padding: 20px 0; /* Padding del footer */
            position: relative; /* Posicionamiento relativo */
            bottom: 0; /* Mantener el footer en la parte inferior */
            width: 100%; /* Ancho completo */
            box-shadow: 0 -1px 10px rgba(0, 0, 0, 0.2); /* Sombra para el footer */
        }

        /* Estilos para el texto del footer */
        footer p {
            margin: 0; /* Sin margen */
            font-size: 0.9rem; /* Tamaño de fuente más pequeño */
        }
    </style>
</head>
<body>

    <!-- Incluir el header -->
    <?= $this->include('templates/header.php') ?> 

    <!-- Sidebar de navegación -->
    <div class="sidebar">
        <h4>Menú del Cliente</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('cliente/ver_catalogo') ?>"><i class="fas fa-th"></i> Ver Catálogo de Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('cliente/ver_carrito') ?>"><i class="fas fa-shopping-cart"></i> Ver Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('cliente/historial_compras') ?>"><i class="fas fa-history"></i> Historial de Compras</a>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <?= $this->renderSection('content') ?> <!-- Renderizar la sección de contenido -->
    </div>

    <!-- Incluir el footer -->
    <?= $this->include('templates/footer.php') ?> 

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" defer></script>
</body>
</html>
