            <h1>Algunos de nuestros productos</h1>

            <?php while ($product = $productos->fetch_object()) : ?>
                <div class="product">
                    <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
                        <?php if ($product->imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="thumb">
                        <?php else : ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta ">
                        <?php endif; ?>
                        <h2><?= $product->nombre ?></h2>
                    </a>
                    <p>$ <?= $product->precio ?> Euros</p>
                    <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button button-green">Comprar</a>
                </div>
            <?php endwhile; ?>

            <div class="product">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta ">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 Euros</p>
                <a href="">Comprar</a>
            </div>

            <div class="product">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta ">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 Euros</p>
                <a href="">Comprar</a>
            </div>