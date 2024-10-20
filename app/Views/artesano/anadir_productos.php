<?= $this->extend('artesano/artesano') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Añadir Producto</h1>

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

    <form action="<?= site_url('artesano/guardar_producto') ?>" method="post" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" required step="0.01" min="0">
        </div>

        <div class="form-group">
        <label for="imagen">Subir Imagen:</label>
        <input type="file" name="imagen" class="form-control" accept="image/*" required>
    </div>

        <div class="form-group">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" class="form-control" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= esc($categoria['id']) ?>"><?= esc($categoria['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Campo oculto para el ID del artesano -->
        <input type="hidden" name="id_artesano" value="<?= esc(session()->get('usuario_id')) ?>">

        <button type="submit" class="btn btn-primary btn-block">Añadir Producto</button>
    </form>
</div>

<?= $this->endSection() ?>
