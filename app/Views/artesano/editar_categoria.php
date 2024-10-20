<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1>Editar Categoría</h1>
<form action="<?= site_url('artesano/categoria/actualizar/' . $categoria['id']) ?>" method="post">
    <div class="form-group">
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $categoria['nombre'] ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $categoria['descripcion'] ?>" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </div>
</form>

<?= $this->endSection() ?>