<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>
<p>Aquí podrás gestionar las categorías de tus productos.</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th> <!-- Nueva columna para descripción -->
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí iría la lógica para mostrar las categorías desde la base de datos -->
        <?php 
        $contador =1;
        foreach($categorias as $categoria): ?> 
            <tr>
                <td><?php echo $contador++; ?></td>
                <td><?php echo $categoria['nombre'];?></td>
                <td><?php echo $categoria['descripcion'];?></td>
                <td>
                <a href="<?= site_url('artesano/categoria/editar/' . $categoria['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="<?= site_url('artesano/categoria/delete/' . $categoria['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                
            </td>
                 
            </tr>

        <?php endforeach;?>
        </tr>
    </tbody>
</table>
<div class="text-center"> <!-- Centro del botón -->
    <a href="<?= site_url('artesano/anadir_categoria') ?>" class="btn btn-primary">Añadir Categoría</a>
</div>

<?= $this->endSection() ?>
