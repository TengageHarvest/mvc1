<?php
class productoController extends Controller{
    private $modeloProducto;
    private $modeloCategoria;
    private $modeloMarca;

    //crear el constructor
    public function __construct(){
        //instanciar los modelos
        $this->modeloProducto = $this->loadModel("mdlProducto");
        $this->modeloCategoria = $this->loadModel("mdlCategoria");
        $this->modeloMarca = $this->loadModel("mdlMarca");
    }

    //método para cargar la página administrativa
    public function principal(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/principal.php';
        require APP . 'view/_templates/footer.php';
    }

    public function crearProducto(){
        if(isset($_POST['btnGuardarP'])){

            $estado=1;
            $this->modeloProducto->__SET('Nom_Producto', $_POST['txtNombreProducto']);
            $this->modeloProducto->__SET('Precio', $_POST['txtPrecio']);
            $this->modeloProducto->__SET('Estado', $estado);
            $this->modeloProducto->__SET('Cantidad', $_POST['txtCantidad']);
            $this->modeloProducto->__SET('Garantia', $_POST['txtGarantia']);
            $this->modeloProducto->__SET('Fecha_Garantia', $_POST['txtFechaGarantia']);
            $this->modeloProducto->__SET('Descripcion', $_POST['txtDescripcion']);
            $this->modeloProducto->__SET('idMarca', $_POST['SelMarca']);
            $this->modeloProducto->__SET('idCategoria', $_POST['SelCategoria']);
            $this->modeloProducto->__SET('Serie', $_POST['txtSerie']);

           // var_dump($_POST['btnGuardarP']);
            //exit();
            
            $producto = $this->modeloProducto->crearProducto();
            
            
            if($producto == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '', 
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location:".URL."productoController/listarProductos");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '', 
                    icon: 'error',
                    title: 'Ha ocurrido un error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location:".URL."productoController/crearProducto");
                    exit();
            }
        }

        $listarCategoria = $this->modeloCategoria->listarCategoria();
        $listarMarca = $this->modeloMarca->listarMarca();
        $listarProductos = $this->modeloProducto->listarProductos();
       
        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/crearProducto.php';
        require APP . 'view/_templates/footer.php';
    }


    public function listarProductos(){
        if(isset($_POST['btnEditarP'])){
            $this->modeloProducto->__SET('Nom_Producto', $_POST['txtNombreProducto']);
            $this->modeloProducto->__SET('Precio', $_POST['txtPrecio']);
            $this->modeloProducto->__SET('Cantidad', $_POST['txtCantidad']);
            $this->modeloProducto->__SET('Garantia', $_POST['txtGarantia']);
            $this->modeloProducto->__SET('Fecha_Garantia', $_POST['txtFechaGarantia']);
            $this->modeloProducto->__SET('Descripcion', $_POST['txtDescripcion']);
            $this->modeloProducto->__SET('idMarca', $_POST['SelMarca']);
            $this->modeloProducto->__SET('idCategoria', $_POST['SelCategoria']);
            $this->modeloProducto->__SET('Serie', $_POST['txtSerie']);
            $this->modeloProducto->__SET('idProducto', $_POST['txtIdProducto']);
            
            $update = $this->modeloProducto->modificarProducto();

            if($update == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '', 
                    icon: 'success',
                    title: 'Actualización Exitosa',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location:".URL."productoController/listarProductos");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '', 
                    icon: 'error',
                    title: 'Ha ocurrido un error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location:".URL."productoController/listarProductos");
                    exit();
            }
        }

        $listarCategoria = $this->modeloCategoria->listarCategoria();
        $listarMarca = $this->modeloMarca->listarMarca();
        $listarProductos = $this->modeloProducto->listarProductos();

        require APP . 'view/_templates/header.php';
        require APP . 'view/producto/listarProductos.php';
        require APP . 'view/_templates/footer.php';
    }

    public function cambiarEstado(){
        //crear un variable para controlar
        $this->modeloProducto->__SET("idProducto", $_POST["id"]);
        $respuesta = $this->modeloProducto->cambiarEstado();
        if($respuesta == true){
            echo json_encode("1");
        }else{
            echo json_encode("0");
        }
    }

    public function eliminarProducto(){
        $estado = $this->modeloProducto->eliminarProducto($_POST['id']); 
        echo 1;
    }

    public function datoProducto(){
        $producto = $this->modeloProducto->ProductoId($_POST['id']);
        echo json_encode($producto);
    }

}

?>
