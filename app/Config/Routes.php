<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/productoprueba', 'Productos::index');
$routes->get('/productoprueba/(:num)', 'Productos::show/$1');
$routes->get('/productoprueba/transaccion', 'Productos::transaccion');


 $routes->get('/', 'LoginController::index');
$routes->get('/productos/(:num)', 'Home::show/$1');
$routes->get('/productos/(:alpha)/(:num)', 'Home::show/$1/$2');
$routes->get('/productos/(:num)', 'Home::show/$1');

//directo viiew
$routes->view('/producto', 'front2/InicioSesion');
$routes->view('/producto/([0-9]{2})', 'front2/InicioSesion');

// grupos
$routes->group('admin', static function($routes) {
    $routes->get('/productos/([0-9]{2})', 'Admin\Home::show/$1');
});

$routes->get('/vista', 'Home::pvista');

$routes->get('/logout', 'LoginController::logout');

// Rutas para el registro
$routes->get('Registro', 'RegistroController::index');
$routes->post('registro/registrar', 'RegistroController::registrar');

// Rutas para el inicio de sesión
$routes->get('login', 'LoginController::index');
$routes->post('login/autenticar', 'LoginController::autenticar');



// Rutas para los dashboards según el rol
$routes->get('artesano', 'DashboardController::artesano');
$routes->get('cliente', 'DashboardController::cliente');
$routes->get('repartidor', 'DashboardController::repartidor');
$routes->get('administrador', 'DashboardController::administrador');

//------------------------ Rutas para el artesano-----------------
$routes->get('artesano/ver_productos', 'artesano\C_producto::verProductos'); // Ruta para ver productos
$routes->get('artesano/anadir_productos', 'artesano\C_producto::anadir'); // Ruta para mostrar el formulario de añadir productos
$routes->post('artesano/guardar_producto', 'artesano\C_producto::guardar_producto');
$routes->get('artesano/anadir_categoria', 'artesano\C_categoria::anadirCategoria');
 $routes->get('artesano/anadir_almacen', 'Artesano::anadirAlmacen');
$routes->get('artesano/categoria', 'artesano\C_categoria::index');
 $routes->get('artesano/ver_ventas', 'Artesano::verVentas');

// Rutas para editar y eliminar productos
$routes->get('artesano/editar_producto/(:num)', 'artesano\C_producto::editar/$1'); // Ruta para editar un producto
$routes->post('artesano/actualizar_producto/(:num)', 'artesano\C_producto::actualizar/$1'); // Ruta para actualizar el producto
$routes->get('artesano/eliminar_producto/(:num)', 'artesano\C_producto::eliminar/$1'); // Ruta para eliminar un producto

//categoria 
$routes->get('artesano/categoria/delete/(:num)', 'artesano\C_categoria::delete/$1');
$routes->post('artesano/guardar_categoria', 'artesano\C_categoria::guardar_categoria'); 
$routes->get('artesano/categoria/editar/(:num)', 'artesano\C_categoria::editar/$1');
$routes->post('artesano/categoria/actualizar/(:num)', 'artesano\C_categoria::actualizar/$1');
//almacen
// Almacén
$routes->get('artesano/almacen', 'artesano\C_almacen::index'); // Mostrar lista de almacenes
$routes->get('artesano/almacen/anadir', 'artesano\C_almacen::anadirAlmacen'); // Mostrar formulario para añadir un nuevo almacén
$routes->post('artesano/guardar_almacen', 'artesano\C_almacen::guardar_almacen'); // Guardar nuevo almacén
$routes->get('artesano/almacen/delete/(:num)', 'artesano\C_almacen::delete/$1'); // Eliminar almacén
$routes->get('artesano/almacen/editar/(:num)', 'artesano\C_almacen::editar/$1'); // Mostrar formulario para editar almacén
$routes->post('artesano/almacen/actualizar/(:num)', 'artesano\C_almacen::actualizar/$1'); // Actualizar almacén
//registrar en almacen
$routes->get('artesano/filtrar_productos', 'artesano\C_producto::filtrarPorAlmacen'); // Mostrar lista de almacenes
$routes->get('artesano/registrar_en_almacen/(:num)/(:num)','artesano\C_registrar_en_almacen::ingresa/$1/$2');
$routes->get('artesano/registrar_en_almacen', 'artesano\C_registrar_en_almacen::index'); // Mostrar lista de almacenes




// ---------------------------------Rutas para el cliente-------------------------
$routes->get('cliente', 'cliente\Cliente::index');
$routes->get('cliente/ver_catalogo', 'cliente\C_catalogo::verCatalogo');
$routes->get('cliente/ver_carrito', 'cliente\Cliente::verCarrito');
$routes->get('cliente/historial_compras', 'cliente\Cliente::historialCompras');

$routes->get('cliente/agregar_carrito/(:num)', 'cliente\C_catalogo::agregarCarrito/$1');


//----------------administrador----------------------
// Rutas para el almacenamiento
$routes->get('administrador/ver_almacen', 'administrador\C_almacen::index'); // Mostrar lista de almacenes
$routes->get('administrador/anadir_almacen', 'administrador\C_almacen::anadirAlmacen'); // Mostrar formulario para añadir un nuevo almacén
$routes->post('administrador/guardar_almacen', 'administrador\C_almacen::guardar_almacen'); // Guardar nuevo almacén
$routes->get('administrador/eliminar_almacen/(:num)', 'administrador\C_almacen::delete/$1'); // Eliminar almacén
$routes->get('administrador/editar_almacen/(:num)', 'administrador\C_almacen::editar/$1'); // Mostrar formulario para editar almacén
$routes->post('administrador/actualizar_almacen/(:num)', 'administrador\C_almacen::actualizar/$1'); // Actualizar almacén



// Rutas para categorías
$routes->get('administrador/ver_categorias', 'administrador\C_categoria::index'); // Mostrar lista de categorías
$routes->get('administrador/editar_categoria/(:num)', 'administrador\C_categoria::editar/$1'); // Mostrar formulario para editar categoría
$routes->post('administrador/actualizar_categoria/(:num)', 'administrador\C_categoria::actualizar/$1'); // Actualizar categoría
$routes->get('administrador/eliminar_categoria/(:num)', 'administrador\C_categoria::delete/$1'); // Eliminar categoría


$routes->get('administrador/ver_productos', 'administrador\C_producto::index'); // Mostrar lista de productos
$routes->get('administrador/editar_producto/(:num)', 'administrador\C_producto::editar/$1'); // Mostrar formulario para editar producto
$routes->post('administrador/actualizar_producto/(:num)', 'administrador\C_producto::actualizar/$1'); // Actualizar producto
$routes->get('administrador/eliminar_producto/(:num)', 'administrador\C_producto::delete/$1'); // Eliminar producto

// rutas para el controlador de usuarios

$routes->get('administrador/ver_usuarios', 'administrador\C_usuario::index');
$routes->get('administrador/editar_usuario/(:num)', 'administrador\C_usuario::editar/$1');
$routes->post('administrador/actualizar_usuario/(:num)', 'administrador\C_usuario::actualizar/$1');
$routes->post('administrador/delete_usuario/(:num)', 'administrador\C_usuario::delete/$1');

// Cargar rutas adicionales basadas en el entorno
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
