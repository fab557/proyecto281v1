<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1>Catálogo de Almacenes</h1>
<p>Aquí podrás ver el estado del almacén.</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Almacén</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Latitud</th> <!-- Nueva columna para latitud -->
            <th>Longitud</th> <!-- Nueva columna para longitud -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $contador = 1; // Inicializa el contador para enumerar filas
        foreach($almacenes as $almacen): ?> 
            <tr>
                <td><?php echo $contador++; ?></td> <!-- Muestra el número de fila -->
                <td><?php echo esc($almacen['nombre']); ?></td> <!-- Muestra el nombre del almacén -->
                <td><?php echo esc($almacen['direccion']); ?></td> <!-- Muestra la dirección del almacén -->
                <td><?php echo esc($almacen['telefono']); ?></td> <!-- Muestra el teléfono del almacén -->
                <td><?php echo esc($almacen['latitud']); ?></td> <!-- Muestra la latitud del almacén -->
                <td><?php echo esc($almacen['longitud']); ?></td> <!-- Muestra la longitud del almacén -->
                <td>
                    <a href="<?= site_url('artesano/almacen/editar/' . $almacen['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= site_url('artesano/almacen/delete/' . $almacen['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="text-center"> <!-- Centro del botón -->
    <a href="<?= site_url('artesano/almacen/anadir') ?>" class="btn btn-primary">Añadir Almacén</a>
</div>

<?= $this->endSection() ?>
