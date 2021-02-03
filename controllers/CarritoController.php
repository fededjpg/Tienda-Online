<?php 

require_once 'models/producto.php';

class CarritoController{

    public function index(){

    if (isset($_SESSION['carrtito']) && count($_SESSION['carrito']) >= 1){
        $carrito=$_SESSION['carrito'];

    }else{
        $carrito= array();
    }
        // echo "controlador pedidos, accion index";

        require_once 'views/carrito/index.php';
    }

    public function add(){
        if($_GET['id']){
            $producto_id=$_GET['id'];
        }else{
            header("Location=".base_url);
        }

        if(isset($_SESSION['carrito'])){

            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                $counter=0;
                # code...
                if($elemento['id_producto']== $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }

        }
        if(!isset($counter) || $counter==0){
            //conseguir producto   
            $producto= new Producto() ;
            $producto->setId($producto_id);
            $product=$producto->getOneProducto();
            //añadir AL CARRITO
            if(is_object($product)){
            $_SESSION['carrito'][]= array(
                "id_producto"=> $product->id,
                "precio"=> $product->precio,
                "unidades"=> 1,
                "producto"=> $product

            );
            }
        }
        header("Location:".base_url."carrito/index");
    
    }

    public function remove(){

    }

    public function deleteAll(){
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");

    }
}

?>