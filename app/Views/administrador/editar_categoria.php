<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2>Editar Categoría</h2>
    <form action="/administrador/actualizar_categoria/<?= $categoria['id'] ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $categoria['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?= $categoria['descripcion'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<?= $this->endSection() ?>
