<?= $this->extend('administrador/administrador') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Listado de Usuarios</h2>

    <!-- Mostrar mensajes de éxito -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabla de usuarios -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($usuarios)): ?>
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['id']) ?></td>
                        <td><?= esc($usuario['nombre']) ?></td>
                        <td><?= esc($usuario['correo']) ?></td>
                        <td><?= esc($usuario['rol']) ?></td>
                        <!-- Mostrar la contraseña encriptada (no es recomendable, pero agregada según solicitud) -->
                        <td><?= esc($usuario['password']) ?></td>
                        <td>
                            <!-- Botones para editar y eliminar -->
                            <a href="<?= base_url('administrador/editar_usuario/'.$usuario['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <form action="<?= base_url('administrador/eliminar_usuario/'.$usuario['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay usuarios disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
