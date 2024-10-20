<?= $this->extend('artesano/artesano') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>
<p>Aquí podrás ver el historial de ventas.</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí iría la lógica para mostrar las ventas desde la base de datos -->
        <tr>
            <td>1</td>
            <td>Producto 1</td>
            <td>2</td>
            <td>$20.00</td>
            <td>2024-09-28</td>
        </tr>
    </tbody>
</table>

<?= $this->endSection() ?>
