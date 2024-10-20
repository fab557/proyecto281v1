<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1>Añadir categoria</h1>
<form action="<?= site_url('artesano/guardar_categoria') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="precio">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>
    <div class="text-center"> <!-- Centro del botón -->
        <button type="submit" class="btn btn-primary">Añadir Categoria</button>
    </div>
</form>

<?= $this->endSection() ?>
