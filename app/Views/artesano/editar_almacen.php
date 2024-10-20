<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1>Editar Almacén</h1>
<form action="<?= site_url('artesano/almacen/actualizar/' . $almacen['id']) ?>" method="post">
    <div class="form-group">
        <label for="nombre">Nombre del almacén</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($almacen['nombre']) ?>" required>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= esc($almacen['direccion']) ?>" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= esc($almacen['telefono']) ?>">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" required><?= esc($almacen['descripcion']) ?></textarea>
    </div>
    <div class="form-group">
        <label for="latitud">Latitud</label>
        <input type="text" class="form-control" id="latitud" name="latitud" value="<?= esc($almacen['latitud']) ?>" required>
    </div>
    <div class="form-group">
        <label for="longitud">Longitud</label>
        <input type="text" class="form-control" id="longitud" name="longitud" value="<?= esc($almacen['longitud']) ?>" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Actualizar Almacén</button>
    </div>
</form>

<?= $this->endSection() ?>
