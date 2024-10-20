<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1>Añadir Almacén</h1>
<form action="<?= site_url('artesano/guardar_almacen') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre del Almacén</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    <div class="form-group">
        <label for="latitud">Latitud</label>
        <input type="text" class="form-control" id="latitud" name="latitud" placeholder="Ejemplo: 12.345678" required>
    </div>
    <div class="form-group">
        <label for="longitud">Longitud</label>
        <input type="text" class="form-control" id="longitud" name="longitud" placeholder="Ejemplo: -12.345678" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono (opcional)">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Añadir Almacén</button>
    </div>
</form>

<?= $this->endSection() ?>
