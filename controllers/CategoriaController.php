<?php 
require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias= $categoria->getAllCategorias();

        require_once 'views/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $categoria= new Categoria();
            $categoria->setId($id);
            $categoriaOne=$categoria->getOneCategoria();

            $producto= new Producto();
            $producto->setCategoriaId($id);
            $product=$producto->getAllCategoria();

        }
        require_once 'views/categoria/ver.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        $categoria= new Categoria();

        if(isset($_POST) && isset($_POST['nombre'])){
        $categoria->setNombre($_POST['nombre']);
        $categoria->save();
        }
        //guardar la categoria en la base de datos

        header("Location:". base_url."categoria/index");
    }
}

?>