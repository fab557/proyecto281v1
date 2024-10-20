<?= $this->extend('cliente/cliente') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Catálogo de Productos</h2>
<p class="text-center mb-4">Aquí puedes explorar nuestra selección de productos.</p>

<div class="container">
    <div class="row">
        <?php foreach ($productos as $producto): 
            $urlImg = esc(base_url($producto['urlimg']));
            ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-light">
            <?php 
                        // Verificar la URL de la imagen
                        if (!empty($urlImg)): ?>
                            <img src="<?= $urlImg ?>" alt="<?= esc($producto['nombre']) ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
                        <?php else: ?>
                            <span>No disponible</span>
                        <?php endif; ?>
                    <div class="card-body">
                    <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                    <p class="card-text"><?= $producto['descripcion'] ?></p>
                    <p class="card-text"><strong>En Stock: </strong><?= $producto['cantidad'] ?></p>
                    <p class="card-text"><strong>Categoria: </strong><?= $producto['categoria'] ?></p>
                    <p class="card-text"><strong>Precio:</strong> $<?= number_format($producto['precio'], 2) ?></p>
                    <a href="<?= site_url('cliente/agregar_carrito/'.$producto['id']) ?>" class="btn btn-primary">Agregar al Carrito</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
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
