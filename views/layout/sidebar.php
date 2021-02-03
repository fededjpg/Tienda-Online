    <!-- BARRALATERAL -->

    <aside id="lateral">

        <div id="login" class="block_aside">
            <div id="carrito" class="block_aside">
                <h3>Mi carrito</h3>
                <ul>
                    <?php $stats=Utils::statsCarrito(); ?>
                    <li><a href="<?=base_url.'carrito/index'?>">Porductos(<?= $stats['count']?>)</a></li>
                    <li><a href="<?=base_url.'carrito/index'?>">Total $ <?= $stats['total']?> Euros</a></li>
                    <li><a href="<?=base_url.'carrito/index'?>">Ver el carrito</a></li>
                </ul>
            </div>
            <?php if (!isset($_SESSION['identity'])) : ?>
                <h3>Entrar a la web</h3>
                <form action="<?= base_url ?>usuario/login" method="post">

                    <label for="email">email</label>
                    <input type="email" name="email" id="email">

                    <label for="password">contraseña</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" value="Enviar">
                </form>

            <?php else : ?>
                <h3><?= $_SESSION['identity']->nombre ?><?= $_SESSION['identity']->apellidos ?></h3>
            <?php endif; ?>
            <ul>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li><span><i class="fas fa-key"></i></span>
                        <a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a>
                    </li>
                    <li><span><i class="fas fa-lock"></i></span>
                        <a href="<?=base_url.'categoria/index'?>">Gestionar categorias</a>
                    </li>
                    <li><span><i class="fab fa-product-hunt"></i></span>
                        <a href="<?=base_url?>producto/gestion">Gestionar productos</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['identity'])) : ?>
                    <li><span><i class="fas fa-user"></i></span>
                        <a href="<?=base_url?>pedido/misPedidos">Mis pedidos</a>
                    </li>
                    <li><span><i class="fas fa-sign-out-alt"></i></span>
                        <a href="<?= base_url ?>usuario/logout">Cerrar session</a>
                    </li>
                <?php else: ?>   
                <li><span><i class="fas fa-user"></i></span>
                        <a href="<?= base_url ?>usuario/registro">Registrar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO CENTRAL -->

    <div id="central">