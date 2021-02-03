<?php 

class Utils{
    public static function deleteSession($name_session){
        if(isset($name_session)){
        $_SESSION[$name_session]=null;
        unset ($_SESSION[$name_session]);
        }
        return $name_session;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }

    }

    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }else{
            return true;
        }

    }

    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria= new Categoria();
        $categorias= $categoria->getAllCategorias();

        return $categorias;
    }

    public static function statsCarrito(){
        $stats= array(
            'count'=>0,
            'total'=>0
        );
        if(isset($_SESSION['carrito'])){
        $stats['count'] = count($_SESSION['carrito']);

        foreach ($_SESSION['carrito'] as $key => $producto) {
            $stats['total']+= $producto['precio']*$producto['unidades'];
        }
        }

        return $stats;
    }

    public static function showStatus($status){
        $value="pendiente";
        if($status=='confirm'){
            $value="Pendiente";
        }elseif($status=='preparation'){
            $value="En preparacion";
        }elseif($status=='ready'){
            $value="preparado para enviar";
        }elseif($status=="send"){
            $value="Enviado";
        }

        return $value;
    }
}

?>