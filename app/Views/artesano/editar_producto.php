<?= $this->extend('artesano/artesano') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Editar Producto</h1>

    <!-- Mostrar mensajes de éxito o error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Ajuste de la ruta para la acción de edición -->
    <form action="<?= site_url('artesano/actualizar_producto/' . esc($producto['id'])) ?>" method="post" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        <input type="hidden" name="id" value="<?= esc($producto['id']) ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required><?= esc($producto['descripcion']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" value="<?= esc($producto['precio']) ?>" required>
        </div>

        <div class="form-group">
        <label for="imagen">Subir Imagen:</label>
        <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>


        <div class="form-group">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" class="form-control" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= esc($categoria['id']) ?>" <?= $categoria['id'] == $producto['id_categoria'] ? 'selected' : '' ?>><?= esc($categoria['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Actualizar Producto</button>
    </form>
</div>

<?= $this->endSection() ?>
