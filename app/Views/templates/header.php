<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Mi Sitio Web') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        header {
            background-color: #007bff; /* Color de fondo del header */
            color: white; /* Color del texto */
            position: fixed; /* Fijo en la parte superior */
            top: 0;
            left: 0;
            width: 100%; /* Ancho completo */
            z-index: 1000; /* Para asegurarse de que esté en la parte superior */
            padding: 15px 0; /* Espacio alrededor del contenido */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
        }

        .navbar-brand {
            color: white; /* Color del nombre del sitio */
            font-size: 1.5rem; /* Tamaño de fuente del nombre */
            font-weight: bold; /* Negrita */
        }

        .navbar-nav .nav-link {
            color: white; /* Color de los enlaces */
            font-size: 1.1rem; /* Tamaño de fuente de los enlaces */
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00; /* Color al pasar el ratón */
        }

        .dropdown-menu {
            background-color: #007bff; /* Fondo del menú desplegable */
            border: none; /* Sin borde */
        }

        .dropdown-item {
            color: white; /* Color de los enlaces en el menú desplegable */
        }

        .dropdown-item:hover {
            background-color: #0056b3; /* Color al pasar el ratón en el menú desplegable */
        }

        .navbar-text {
            margin-right: 15px; /* Margen a la derecha para separación */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?= site_url('artesano') ?>">Mi Sitio Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <span class="navbar-text">
                        Usuario: <strong><?= esc(session()->get('nombre')) ?></strong>
                    </span>
                    <span class="navbar-text">
                        Rol: <strong><?= esc(session()->get('rol')) ?></strong>
                    </span>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="fas fa-user-cog mr-2"></i>Perfil</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=<?= site_url('logout') ?>><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
