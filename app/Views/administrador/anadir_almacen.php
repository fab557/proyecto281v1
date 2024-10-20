<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Añadir Almacén</h1>
    <form action="<?= base_url('administrador/guardar_almacen') ?>" method="post" class="border p-4 rounded shadow-sm bg-light">
        <div class="form-group mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Añadir Almacén</button>
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
        width: 48%;
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
