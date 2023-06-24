<?php
//crearmos y heredamos la clase del controlador
class usuarioController extends Controller{
    //atributos 
    private $modeloU;

    //crear el constructor
    public function __construct(){
        //instanciar los modelos
        $this->modeloU = $this->loadModel("mdlUsuario");

    }

    //método para cargar la página administrativa
    public function principal(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuario/principal.php';
        require APP . 'view/_templates/footer.php';
    }

    //método para cargar el login e iniciar sesión
    public function iniciar(){
        $error = false;
        //validar la sesión
        // if(isset($_SESSION['SESION INICIADA']) && $_SESSION['SESION INICIADA'] == true){
        //     header("Location: ".URL."usuarioController/principal");
        //     exit();
        // }
        if(isset($_POST['btnIngresar'])){
            $this->modeloU->__SET('usuario', $_POST['txtUsuario']);
            $this->modeloU->__SET('clave', $_POST['txtClave']);
            $_POST = [];
            //llamamos al método de validación del modelo
            $validar = $this->modeloU->validarUsuario();

            //revisar la validación
            if($validar == true){
                $_SESSION['SESION INICIADA'] = true;
                $error = false;
                $_SESSION['Nombres'] = $validar['Nombres'];
                $_SESSION['idUsuario'] = $validar['idUsuario'];
                $_SESSION['Apellidos'] = $validar['Apellidos'];
                $_SESSION['Documento'] = $validar['Documento'];
                $_SESSION['Usuario'] = $validar['Usuario'];
                $_SESSION['Descripcion'] = $validar['Descripcion'];

                //después de la validación correcta cargar el admin
                header("Location:".URL."usuarioController/principal");
            }else{
                $error = true;
            }
        }

        require APP . 'view/usuario/index.php';
    }

    public function cerrarSesion(){
        if (isset($_SESSION['SESION INICIADA'])) {
        //  $_SESSION['SESION INICIADA'] = false;
        session_destroy();
        }
            header("Location:".URL."home/index");
            exit();
    }

    #metodo listar usuarios Controlador
    public function listarUsuarios(){
        if(isset($_POST['btnEditar'])){
            $this -> modeloU -> __SET('idTipoDocumento', $_POST['selTipoDocumento']); #si hay un error puede estra aqui, selTiposDocumentos
            $this -> modeloU -> __SET('documento', $_POST['txtDocumento']);
            $this -> modeloU -> __SET('nombres', $_POST['txtNombres']);
            $this -> modeloU -> __SET('apellidos', $_POST['txtApellidos']);
            $this -> modeloU -> __SET('telefono', $_POST['txtTelefono']);
            $this -> modeloU -> __SET('direccion', $_POST['txtDireccion']);
            $this -> modeloU -> __SET('email', $_POST['txtEmail']);
            /* $this -> modeloU -> __SET('idRol', $_POST['selRoles']); */
            $this -> modeloU -> __SET('usuario', $_POST['txtUsuario']);
            $this -> modeloU -> __SET('idUsuario', $_POST['txtIdUsuario']);

            $update = $this->modeloU->modificarUsuario();

            if($update == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Actualizacion Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."usuarioController/listarUsuarios");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."usuarioController/listarUsuarios");
                    exit();
            }
        }
        $usuario = $this->modeloU->listarUsuarios();
        $roles = $this->modeloU->listarRoles();
        $tiposDocumentos = $this->modeloU->listarTipoDocumento();

        require(APP . 'view/_templates/header.php');
        require(APP . 'view/usuario/listarUsuarios.php');
        require(APP . 'view/_templates/footer.php');
    }

    #metodo para registarr personas
    public function registrarUsuario(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']); #igual aqui 
            $this->modeloU->__SET('documento', $_POST['txtDocumento']);
            $this->modeloU->__SET('nombres', $_POST['txtNombres']);
            $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
            $this->modeloU->__SET('fechaNacimiento', $_POST['txtFechaNacimiento']);
            $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloU->__SET('email', $_POST['txtEmail']);

            $persona = $this->modeloU->registrarPersona();

            if($persona == true){
                $ultimoId = $this->modeloU->ultimoIdPersona();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdPersona'];
                }
            }

            $this->modeloU->__SET('idPersona', $ultimoIdValue);
            $this->modeloU->__SET('usuario', $_POST['txtUsuario']);
            $this->modeloU->__SET('clave', $_POST['txtClave']);
            $this->modeloU->__SET('idRol', $_POST['selRoles']);

            $usuario = $this->modeloU->registrarUsuario();

            if($persona == true && $usuario == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."usuarioController/registrarUsuario");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."usuarioController/registrarUsuario");
                    exit();
            }
        }

        $roles = $this->modeloU->listarRoles();
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        require APP. 'view/_templates/header.php';
        require APP. 'view/usuario/crearUsuarios.php';
        require APP. 'view/_templates/footer.php';
    }

    public function datoUsuario(){
        //crear una variable para controlar
        $usuario = $this->modeloU->usuarioId($_POST['id']);
        echo json_encode($usuario);
    }

    public function cambiarEstado(){
        $estado = $this->modeloU->cambiarEstado($_POST['id']);
        echo 1;
    }

    public function eliminarUsuario(){
        $estado = $this->modeloU->eliminarUsuario($_POST['id']);
        echo 1;
    }
    
}
?>