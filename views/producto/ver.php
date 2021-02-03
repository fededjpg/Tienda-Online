<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" class="thumb">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta ">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $pro->descripcion ?></p>
            <p class="price">$ <?= $pro->precio ?> Euros</p>
            <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button button-green">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>