<?php 
require_once 'models/pedido.php';

class PedidoController{

    public function hacer(){

        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        // var_dump($_POST);
        if(isset($_POST)  && $_SESSION['identity'] ){
            $usuario_id= $_SESSION['identity']->id;
            $stats= Utils::statsCarrito();
            $coste=$stats['total'];
            $provincia= isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad= isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion= isset($_POST['direccion']) ? $_POST['direccion'] : false;
        if($provincia && $localidad && $direccion){
            $pedido= new Pedido();
            $pedido->setProvincia($provincia);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setUsuarioId($usuario_id);
            $pedido->setCoste($coste);

            $save=$pedido->save();

            //guardar linea de pedidos
            $saveLinea=$pedido->saveLinea();
            if($save && $saveLinea){
                $_SESSION['pedido']="complete";
            }else{
                $_SESSION['pedido']="failed";
            }
        }else{
            $_SESSION['pedido']="failed";
        }
        header("Location:".base_url.'pedido/confirmado');

        }else{
            header("Location:". base_url);
        }
    }

    public function confirmado(){


        if(isset($_SESSION['identity'])){
            $identiy= $_SESSION['identity'];
            $pedido= new Pedido();
            $pedido->setUsuarioId($identiy->id);
            $pedido=$pedido->getOneByUSer();

            $pedidoProducto = new Pedido();
            $productos=$pedidoProducto->getProductByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos(){
        Utils::isIdentity();
        
        $usuario_id= $_SESSION['identity']->id;
        $pedido= new Pedido();

        //sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos=$pedido->getAllByUser();
        require_once 'views/pedido/misPedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            //sacar los pedidos
            $pedido= new Pedido();
            $pedido->setId($id);
            $pedido=$pedido->getOneProducto();

            $pedidoProducto = new Pedido();
            $productos=$pedidoProducto->getProductByPedido($id);

            require_once 'views/pedido/detalle.php';
        }
        else{
            header("Location:".base_url."pedido/misPedidos");
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion=true;

        $pedido= new Pedido();
        $pedidos=$pedido->getAllCategorias();

        require_once "views/pedido/misPedidos.php";
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //recojo los datos del formulario
            $id=$_POST['pedido_id'];
            $estado= $_POST['estado'];
            //update del pedido

            $pedido= new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateOne();

            header("Location:".base_url.'pedido/detalle&id='.$id);
        }else{
            echo "no llego nado";
            // header("Location:".base_url);
        }

    }
}

?>