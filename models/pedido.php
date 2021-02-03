<?php
class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;


    private $db;

    public function __construct(){
        $this->db= Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getUsuarioId(){
        return $this->usuario_id;
    }
    public function getProvincia(){
        return $this->provincia;
    }
    public function getLocalidad(){
        return $this->localidad;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getCoste(){
        return $this->coste;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getHora(){
        return $this->hora;
    }




    public function setId($id){
        return $this->id=$id;
    }
    public function setUsuarioId($usuario_id){
        return $this->usuario_id=$usuario_id;
    }
    public function setProvincia($provincia){
        return $this->provincia=$this->db->real_escape_string($provincia);
    }
    public function setLocalidad($localidad){
        return $this->localidad=$this->db->real_escape_string($localidad);
    }
    public function setDireccion($direccion){
        return $this->direccion=$this->db->real_escape_string($direccion);
    }
    public function setCoste($coste){
        return $this->coste=$coste;
    }
    public function setEstado($estado){
        return $this->estado=$estado;
    }
    public function setFecha($fecha){
        return $this->fecha=$fecha;
    }
    public function setHora($hora){
        return $this->hora=$hora;
    }
    
    public function getAllCategorias(){
        $sql="SELECT * FROM pedidos ORDER BY id DESC";
        $productos= $this->db->query($sql);

        return $productos;
    }

    public function getOneProducto(){
    $sql="SELECT * FROM pedidos WHERE id={$this->getId()}";
    $producto = $this->db->query($sql);

    return $producto->fetch_object();
    
    }

    public function getOneByUSer(){
        $sql="SELECT p.id, p.coste FROM pedidos p INNER JOIN lineas_pedidos lp ON lp.pedido_id= p.id WHERE p.usuario_id= '{$this->getUsuarioId()}' ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
    
        // echo $sql;
        // echo $this->db->error;
        // die();
        return $pedido->fetch_object();
        
        }

        public function getAllByUser(){
            // $sql="SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id= {$id} )";

            $sql="SELECT p.* FROM pedidos p WHERE p.usuario_id={$this->getUsuarioId()} ORDER BY id DESC";

            $producto = $this->db->query($sql);
            // echo $sql;
            // echo $this->db->error;
            // die();
            return $producto;
        }


    public function getProductByPedido($id){
            // $sql="SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id= {$id} )";

            $sql="SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id= lp.producto_id WHERE lp.pedido_id={$id}";

            $producto = $this->db->query($sql);
            // echo $sql;
            // echo $this->db->error;
            // die();
            return $producto;
        }


    public function save(){
        $sql="INSERT INTO pedidos VALUES (NULL, {$this->getUsuarioId()}, '{$this->getProvincia()}','{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME())";
        $save= $this->db->query($sql);
        // echo $sql;
        // echo $this->db->error;
        // die();

        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function saveLinea(){
        $sql="SELECT LAST_INSERT_ID() AS 'pedido';";
        $query= $this->db->query($sql);

        $pedido_id= $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $key => $elemento) {
            # code...
            $producto=$elemento['producto'];

            $insert="INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";

            $save=$this->db->query($insert);
            // var_dump($producto);
            // echo $this->db->error;
            // var_dump($insert);
            // die();
        }

        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function updateOne(){
    $sql="UPDATE pedidos SET estado= '{$this->getEstado()}'";
    $sql.="WHERE id={$this->getId()}";
        $save= $this->db->query($sql);
        // echo $sql;
        // echo $this->db->error;
        // die();
        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

}
    ?>