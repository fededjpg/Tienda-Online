<?php if (isset($gestion)) : ?>
    <h1>gestionar pedidos</h1>
<?php else: ?>
    <h1>mis pedidos</h1>
<?php endif; ?>


<table>
    <tr>
        <th>Numero pedido</th>
        <th>Coste del pedido</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while ($ped = $pedidos->fetch_object()) :
    ?>

        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"> <?= $ped->id ?></a>
            </td>
            <td>
                <?= $ped->coste ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
            <?= Utils::showStatus($ped->estado);?><br>

            </td>
        </tr>
    <?php endwhile; ?>
</table>