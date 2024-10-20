<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2>Lista de Productos</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): 
                 $urlImg = !empty($producto['urlimg']) ? base_url($producto['urlimg']) : 'ruta/por/defecto.png';
                ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= number_format($producto['precio'], 2) ?> $</td>
                    <td>
                        <?php 
                        // Verificar la URL de la imagen
                        if (!empty($urlImg)): ?>
                            <img src="<?= $urlImg ?>" alt="<?= esc($producto['nombre']) ?>" class="img-thumbnail" style="width: 70px; height: auto;">
                        <?php else: ?>
                            <span>No disponible</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $producto['id_categoria'] ?></td>
                    
                    <td>
                        <a href="<?= site_url('administrador/editar_producto/' . $producto['id']) ?>" class="btn btn-warning">Editar</a>
                        <a href="/administrador/eliminar_producto/<?= $producto['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
