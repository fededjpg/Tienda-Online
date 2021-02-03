
<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=="complete"):?>
<strong class="alert_green">El producto se agrego correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && !$_SESSION['producto']=="complete"):?>
<strong class="alert_red">El producto no se agrego correctamente</strong>
<?php endif; ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=="complete"):?>
<strong class="alert_green">El producto se elimino correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && !$_SESSION['delete']=="complete"):?>
<strong class="alert_red">El producto no se elimino correctamente</strong>
<?php endif; ?>

<?php Utils::deleteSession('producto'); ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>CATEGORIAS</th>
        <th>ACCIONES</th>
        
    </tr>
    <?php while($product = $productos->fetch_object()):?>
        <tr>
            <td><?=$product->id;?></td>
            <td><?=$product->nombre;?></td>
            <td><?=$product->precio;?></td>
            <td><?=$product->stock;?></td>
            <td><?=$product->categoria_id;?></td>
            <td>
                <a href="<?=base_url?>producto/eliminar&id=<?=$product->id?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?=base_url?>producto/editar&id=<?=$product->id?>" class="button button-gestion">Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>