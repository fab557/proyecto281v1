<?= $this->extend('artesano/artesano') ?>

<?= $this->section('content') ?>

<div class="productos-container mt-5 shadow-container">
    <h1 class="mb-4">Ver Productos 
        <form action="<?= site_url('artesano/filtrar_productos') ?>" method="get" class="d-inline">
            <select name="id_almacen" onchange="handleSelectChange(this)">
                <option value="" <?= is_null($id_almacen) ? 'selected' : '' ?>>INVENTARIO TOTAL</option>
                <?php foreach ($almacenes as $almacen): ?>
                    <option value="<?= esc($almacen['id']) ?>" <?= (isset($id_almacen) && $id_almacen == $almacen['id']) ? 'selected' : '' ?>>
                        <?= esc($almacen['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </h1>
</div>

<script>
function handleSelectChange(select) {   
    if (select.value === "") {
        // Redirigir a la página de inventario total
        window.location.href = "<?= site_url('artesano/ver_productos') ?>"; // Cambia esta URL por la correspondiente
    } else {
        select.form.submit(); // Si se selecciona un almacén, enviar el formulario
    }
}
</script>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contador = 1;
            foreach ($productos as $producto): 
                
                $urlImg = esc(base_url($producto['urlimg'])); // Escapar la URL de la imagen
            ?>
                <tr>
                    <td><?= $contador++ ?></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td><?= esc($producto['descripcion']) ?></td>
                    <td><?= esc($producto['precio']) ?></td>
                    <td>
                        <?php 
                        // Verificar la URL de la imagen
                        if (!empty($urlImg)): ?>
                            <img src="<?= $urlImg ?>" alt="<?= esc($producto['nombre']) ?>" class="img-thumbnail" style="width: 70px; height: auto;">
                        <?php else: ?>
                            <span>No disponible</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($producto['stock']) ?></td>
                    <td>
                    <form action="<?= site_url('artesano/registrar_en_almacen/' . $producto['id'] . '/' . $id_almacen) ?>" method="get" style="display:inline;">
    <input type="number" name="cantidad" min="1" step="1" class="form-control form-control-sm d-inline-block" style="width: 80px;" required <?= is_null($id_almacen) ? 'disabled' : '' ?> /> 
    
    <!-- Botón para añadir productos -->
    <button type="submit" name="accion" value="anadir" class="btn btn-success btn-sm" <?= is_null($id_almacen) ? 'disabled' : '' ?>>Añadir</button>
    
    <!-- Botón para reducir productos -->
    <button type="submit" name="accion" value="reducir" class="btn btn-primary btn-sm" <?= is_null($id_almacen) ? 'disabled' : '' ?>>Reducir</button>
</form>
    


<!-- Botón para editar -->
<form action="<?= site_url('artesano/editar_producto/' . $producto['id']) ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
</form>

<!-- Botón para eliminar -->
<form action="<?= site_url('artesano/eliminar_producto/' . $producto['id']) ?>" method="post" style="display:inline;">
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
</form>

</td>



                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .productos-container {
        background-color: #f8f9fa; /* Fondo claro para el contenedor */
        padding: 20px;
        border-radius: 10px; /* Bordes redondeados */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Sombra sutil en todos los bordes */
    }

    .productos-container h1 {
        color: #343a40; /* Color de texto para el título */
    }

    .table {
        border-collapse: collapse; /* Colapsar bordes */
    }

    .table th, .table td {
        padding: 15px; /* Espaciado interno */
        text-align: center; /* Centrar texto */
        vertical-align: middle; /* Alinear verticalmente el contenido */
    }

    .table th {
        background-color: #343a40; /* Color de fondo de encabezados */
        color: white; /* Color de texto de encabezados */
        border: 1px solid #dee2e6; /* Borde de las celdas */
    }

    .table td {
        border: 1px solid #dee2e6; /* Borde de las celdas */
    }

    .table tr:hover {
        background-color: #e9ecef; /* Color de fondo al pasar el mouse */
    }

    .img-thumbnail {
        border: 1px solid #dee2e6; /* Borde para la imagen */
        border-radius: .25rem; /* Bordes redondeados para la imagen */
    }

    .btn {
        transition: background-color 0.3s; /* Transición suave para botones */
    }

    .btn:hover {
        opacity: 0.8; /* Efecto de desvanecimiento al pasar el mouse */
    }
    
</style>

<?= $this->endSection() ?>
