<?= $this->extend('cliente/cliente') ?>

<?= $this->section('content') ?>
<h2>Historial de Compras</h2>

<?php if (empty($historial)): ?>
    <p>No has realizado ninguna compra todavía.</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID de Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial as $pedido): ?>
                <tr>
                    <td><?= esc($pedido['id']) ?></td>
                    <td><?= esc($pedido['fecha']) ?></td>
                    <td><?= esc($pedido['total']) ?></td>
                    <td>
                        <a href="<?= site_url('cliente/detalle_pedido/' . $pedido['id']) ?>" class="btn btn-info">Ver Detalles</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?= $this->endSection() ?>
