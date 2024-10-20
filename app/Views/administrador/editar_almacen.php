<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Editar Almacén</h1>
    <form action="<?= base_url('administrador/actualizar_almacen/' . $almacen['id']) ?>" method="post" class="border p-4 rounded shadow-sm bg-light">
        <div class="form-group mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $almacen['nombre'] ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="<?= $almacen['direccion'] ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" class="form-control" value="<?= $almacen['latitud'] ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" class="form-control" value="<?= $almacen['longitud'] ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="<?= $almacen['telefono'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="4"><?= $almacen['descripcion'] ?></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Actualizar Almacén</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<style>
    .container {
        max-width: 600px;
        margin: auto;
    }
    h1 {
        color: #343a40;
    }
    .form-control {
        border-radius: 5px;
        box-shadow: none;
        transition: border-color 0.2s;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn {
        width: 48%; /* Ajustar el tamaño de los botones */
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
