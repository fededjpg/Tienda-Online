<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <h1>Editar Productos <?=$pro->nombre?></h1>
<?php 
// var_dump($pro->descripcion);
// die();
$urlAction=  base_url."producto/save&id=".$pro->id;?> 
<?php else: ?>
<h1>Crea Nuevos Productos Producto </h1>
<?php $urlAction=  base_url."producto/save";?>
<?php endif; ?>

<div class="form_container">
    <form action="<?=$urlAction;?>" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($edit) && is_object($pro) ? $pro->nombre : ''?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?= isset($edit) && is_object($pro) ? $pro->descripcion :''?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($edit) && is_object($pro) ? $pro->precio :''?>">

        <label for="stock">Stcok</label>
        <input type="number" name="stock" value="<?= isset($edit) && is_object($pro) ? $pro->stock :''?>">

        <label for="categoria">Categoria</label>

        <?php $categorias = Utils::showCategorias(); ?>

        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($edit) && is_object($pro) && $cat->id==$pro->categoria_id ?'selected' :''?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <label for="imagen">Imagen</label>
        <?php if(isset($edit) && is_object($pro) && !empty($pro->imagen)):?>
            <img src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" alt=""class="thumb">
            
        <?php endif ?>
        <input type="file" name="imagen">

        <input type="submit" value="<?= isset($pro) && is_object($pro) ? "Actualizar":'Guardar'?>">
    </form>
</div>