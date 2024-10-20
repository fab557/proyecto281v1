<?= $this->extend('administrador/administrador') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2 class="my-4">Editar Usuario</h2>

    <!-- Mostrar mensajes de error -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('errors') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('administrador/actualizar_usuario/'.$usuario['id']) ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" class="form-control" value="<?= esc($usuario['correo']) ?>" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol" class="form-control" required>
                <option value="artesano" <?= $usuario['rol'] == 'artesano' ? 'selected' : '' ?>>Artesano</option>
                <option value="cliente" <?= $usuario['rol'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="repartidor" <?= $usuario['rol'] == 'repartidor' ? 'selected' : '' ?>>Repartidor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña (opcional):</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Dejar en blanco si no se cambia">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Guardar Cambios
        </button>
    </form>
</div>

<?= $this->endSection() ?>
