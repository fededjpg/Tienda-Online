<?php
class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;


    private $db;

    public function __construct(){
        $this->db= Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getCategoriaId(){
        return $this->categoria_id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getOferta(){
        return $this->oferta;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getImagen(){
        return $this->imagen;
    }





    public function setId($id){
        return $this->id=$id;
    }
    public function setCategoriaId($categoria_id){
        return $this->categoria_id=$categoria_id;
    }
    public function setNombre($nombre){
        return $this->nombre= $this->db->real_escape_string($nombre);
    }
    public function setDescripcion($descripcion){
        return $this->descripcion=$this->db->real_escape_string($descripcion);
    }
    public function setPrecio($precio){
        return $this->precio=$this->db->real_escape_string($precio);
    }
    public function setStock($stock){
        return $this->stock=$this->db->real_escape_string($stock);
    }
    public function setOferta($oferta){
        return $this->oferta=$this->db->real_escape_string($oferta);
    }
    public function setFecha($fecha){
        return $this->fecha=$fecha;
    }
    public function setImagen($imagen){
        return $this->imagen=$imagen;
    }
    
    public function getAllCategorias(){
        $sql="SELECT * FROM productos ORDER BY id DESC";
        $productos= $this->db->query($sql);

        return $productos;
    }

    public function getAllCategoria(){
    $sql="SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id= {$this->getCategoriaId()} ORDER BY id DESC";
        $productos= $this->db->query($sql);
        return $productos;
    }

    public function getOneProducto(){
    $sql="SELECT * FROM productos WHERE id={$this->getId()}";
    $producto = $this->db->query($sql);

    return $producto->fetch_object();
    
    }

    public function getRandom($limit){
        $producto=$this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $producto;
    }

    public function save(){
        $sql="INSERT INTO productos VALUES (NULL, {$this->getCategoriaId()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}')";
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

    public function edit(){
        $sql="UPDATE productos SET categoria_id= {$this->getCategoriaId()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()} ";

        if($this->getImagen() !=null){
        $sql.= ",imagen='{$this->getImagen()}'";
        }
        $sql.= "WHERE id= {$this->getId()};";

        // echo $sql;
        // die();

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

    public function delete(){
        $sql="DELETE FROM productos WHERE id={$this->getId()}";
        $eliminar= $this->db->query($sql);

        $result=false;
        if($eliminar){
            $result=true;
        }
        return $result;
    }

}
    ?>