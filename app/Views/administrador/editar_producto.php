<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2>Editar Producto</h2>
    <form action="/administrador/actualizar_producto/<?= $producto['id'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?= $producto['descripcion'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto['precio'] ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="id_categoria">ID de Categoría:</label>
            <input type="number" class="form-control" id="id_categoria" name="id_categoria" value="<?= $producto['id_categoria'] ?>" required>
        </div>
        <div class="form-group">
            <label for="id_artesano">ID de Artesano:</label>
            <input type="number" class="form-control" id="id_artesano" name="id_artesano" value="<?= $producto['id_artesano'] ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<?= $this->endSection() ?>
