<?php if (isset($categoriaOne)) : ?>
    <h1><?= $categoriaOne->nombre ?></h1>
    <?php if ($product->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else : ?>
        <?php while ($produc = $product->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $produc->id ?>">
                    <?php if ($produc->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $produc->imagen ?>" class="thumb">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta ">
                    <?php endif; ?>
                    <h2><?= $produc->nombre ?></h2>
                </a>
                <p>$ <?= $produc->precio ?> Euros</p>
                <a href="<?=base_url?>carrito/add&id=<?=$produc->id?>" class="button button-green">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>la categoria no existe</h1>
<?php endif; ?>