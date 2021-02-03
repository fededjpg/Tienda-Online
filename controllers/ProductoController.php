<?php 
require_once 'models/producto.php';


class ProductoController{

    public function index(){
        //renderizar una vista

        $producto = new Producto();
        $productos=$producto->getRandom(6);
        // var_dump($productos->fetch_object());
        // die();
        require_once 'views/producto/destacados.php';
    }

    public function ver(){

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $producto= new Producto();
            $producto->setId($id);
            $pro= $producto->getOneProducto();
        }

        require_once 'views/producto/ver.php';

    }

    public function gestion(){
        Utils::isAdmin();
    $producto= new Producto();
    $productos= $producto->getAllCategorias();

     require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();

    require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio=isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock=isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria=isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen==isset($_POST['imagen']) ? $_POST['imagen'] : false;
            if($nombre && $descripcion && $precio && $stock && $categoria){
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria);

                //guardar imagen
                if(isset($_FILES['imagen'])){
                $file=$_FILES['imagen'];
                $fileName=$file['name'];
                $mimeType=$file['type'];

                if($mimeType == "image/jpg" || $mimeType == "image/jpeg" || $mimeType =="image/png" || $mimeType =="image/gif"){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images',077, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$fileName);
                    $producto->setImagen($fileName);
                }
            }

                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $producto->setId($id);
                    $save= $producto->edit();
                }else{
                $save= $producto->save();
                }

                if($save){

                    $_SESSION['producto']="complete";

                }else{
                    $_SESSION['producto']= "failed";
                }
            }else{
                $_SESSION['producto']="failed";
            }
        }else{
            $_SESSION['producto']="failed";
        }
        header("Location:".base_url."producto/gestion");

    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $edit=true;

            $producto= new Producto();
            $producto->setId($id);
            $pro= $producto->getOneProducto();
            require_once 'views/producto/crear.php';
        }else{
            header("Location:".base_url."producto/gestion");   
        }
    }
    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
          $elimino=  $producto->delete();
          if($elimino){
              $_SESSION['delete']='complete';
          }else{
              $_SESSION['delete']='failed';
          }
        }else{
            $_SESSION['delete']='failed';
        }
        header("Location:".base_url."producto/gestion");
    }
}

?>