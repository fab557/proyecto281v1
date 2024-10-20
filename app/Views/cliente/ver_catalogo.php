<?= $this->extend('cliente/cliente') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Catálogo de Productos</h2>
<p class="text-center mb-4">Aquí puedes explorar nuestra selección de productos.</p>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <?php foreach ($productos as $producto):
                ?>
                <div class="col-md-4 mb-4">
                    <div class="producto">
                        <?php
                            $urlImg = esc(base_url($producto['urlimg'])); 
                            // Verificar la URL de la imagen
                            if (!empty($urlImg)): ?>
                                <img src="<?= $urlImg ?>" alt="<?= esc($producto['nombre']) ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
                            <?php else: ?>
                                <span>No disponible</span>
                        <?php endif; ?>
                        <h5><?= $producto['nombre'] ?></h5>
                        <p><?= $producto['descripcion'] ?></p>
                        <p><strong>En Stock: </strong><?= $producto['cantidad'] ?></p>
                        <p><strong>Categoria: </strong><?= $producto['categoria'] ?></p>
                        <p><strong>Precio:</strong> $<?= number_format($producto['precio'], 2) ?></p>
                        <a href="<?= site_url('cliente/agregar_carrito/'.$producto['id']) ?>" class="btn btn-primary">Agregar al Carrito</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Carrito de Compras -->
        <!-- Carrito de Compras -->
        <div class="col-md-4">
            <h5>Carrito de Compras</h5>
            <div id="carrito" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                <!-- Mostrar productos del carrito -->
                <ul class="list-group">
                    <?php if (!empty($productosCarrito)): ?>
                        <?php foreach ($productosCarrito as $productoCarrito): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= esc($productoCarrito['nombre']) ?> <!-- Nombre del producto -->
                            <span class="badge bg-primary rounded-pill"><?= esc($productoCarrito['cantidad']) ?></span> <!-- Cantidad -->

                            <!-- Botones para añadir, reducir y eliminar -->
                            <div>
                                <a href="<?= site_url('cliente/agregar_carrito/'.$productoCarrito['id_producto']) ?>" class="btn btn-success btn-sm">+</a> <!-- Añadir -->
                                <a href="<?= site_url('cliente/reducir_carrito/'.$productoCarrito['id_producto']) ?>" class="btn btn-warning btn-sm">-</a> <!-- Reducir -->
                                <a href="<?= site_url('cliente/eliminar_carrito/'.$productoCarrito['id_producto']) ?>" class="btn btn-danger btn-sm">x</a> <!-- Eliminar -->
                            </div>
                        </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">Tu carrito está vacío.</li>
                    <?php endif; ?>
                </ul>
            </div>
            <h6>Total: $<span id="total">0.00</span></h6>
            <a href="<?= site_url('cliente/checkout') ?>" class="btn btn-success">Finalizar Compra</a>
        </div>

    </div>
</div>



<style>
    .card {
        transition: transform 0.2s; /* Agrega un efecto al pasar el ratón sobre la tarjeta */
    }

    .card:hover {
        transform: scale(1.05); /* Aumenta el tamaño de la tarjeta al pasar el ratón */
    }

    .btn-primary {
        background-color: #007bff; /* Color del botón */
        border-color: #007bff; /* Borde del botón */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Color del botón al pasar el ratón */
        border-color: #004085; /* Borde del botón al pasar el ratón */
    }
</style>

<?= $this->endSection() ?>
