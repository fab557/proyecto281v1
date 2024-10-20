<?= $this->extend('cliente/cliente') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    <?php if (empty($productos)): ?>
        <div class="alert alert-warning text-center">
            <p>Tu carrito está vacío.</p>
            <a href="<?= site_url('cliente/ver_catalogo') ?>" class="btn btn-primary">Ver Catálogo</a>
        </div>
    <?php else: ?>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
        $totalCosto = 0; // Inicializar la variable para el costo total
        foreach ($productos as $producto): 
            $totalCosto += $producto['costo']; // Sumar el costo de cada producto
        ?>
            <tr>
                <td><?= esc($producto['nombre']) ?></td>
                <td><?= esc($producto['cantidad']) ?></td>
                <td><?= esc(number_format($producto['precio_unitario'], 2)) ?> $</td>
                <td><?= esc(number_format($producto['costo'], 2)) ?> $</td>
                <td>
                    <a href="<?= site_url('cliente/eliminar_del_carrito/' . $producto['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h5>Total: <?= esc(number_format($totalCosto, 2)) ?> $</h5>
            <a href="<?= site_url('cliente/realizar_pedido') ?>" class="btn btn-success">Realizar Pedido</a>
        </div>
    <?php endif; ?>
</div>

<style>
    table {
        margin-top: 20px;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover, .btn-success:hover {
        opacity: 0.9; 
    }
</style>

<?= $this->endSection() ?>