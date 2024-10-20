<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Lista de Almacenes</h1>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($almacenes as $almacen): ?>
                <tr>
                    <td><?= $almacen['id'] ?></td>
                    <td><?= $almacen['nombre'] ?></td>
                    <td><?= $almacen['direccion'] ?></td>
                    <td><?= $almacen['telefono'] ?></td>
                    <td>
                        <a href="<?= base_url('administrador/editar_almacen/' . $almacen['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('administrador/eliminar_almacen/' . $almacen['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este almacén?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

<style>
    .container {
        max-width: 900px;
        margin: auto;
    }
    h1 {
        color: #343a40;
    }
    .btn {
        margin-right: 5px; /* Espaciado entre botones */
    }
    .table {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .thead-dark th {
        background-color: #343a40;
        color: #ffffff;
    }
</style>
