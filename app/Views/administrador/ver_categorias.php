<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2>Lista de Categorías</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nombre'] ?></td>
                    <td><?= $categoria['descripcion'] ?></td>
                    <td>
                        <a href="<?= site_url('administrador/editar_categoria/' . $categoria['id']) ?>" class="btn btn-warning">Editar</a>
                        <a href="/administrador/eliminar_categoria/<?= $categoria['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
