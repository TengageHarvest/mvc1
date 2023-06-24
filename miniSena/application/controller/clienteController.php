<?php 

class clienteController extends Controller{

    private $modeloU;

    public function __construct(){
        $this->modeloU = $this->loadModel("mdlCliente");
        // Se carga el modelo "mdlCliente" utilizando el método loadModel() del controlador
    }

    public function principal(){
        // Este método se llama cuando se accede a la ruta "/cliente/principal" en la aplicación

        require APP . 'view/_templates/header.php';
        // Se carga el archivo de plantilla "header.php" ubicado en la carpeta "view/_templates"

        require APP . 'view/usuario/principal.php';
        // Se carga la vista "principal.php" ubicada en la carpeta "view/usuario"

        require APP . 'view/_templates/footer.php';
        // Se carga el archivo de plantilla "footer.php" ubicado en la carpeta "view/_templates"
    }

public function registrarCliente(){
    // Este método se llama cuando se envía el formulario con el botón "btnGuardar"

    if(isset($_POST['btnGuardar'])){
        // Verifica si el botón "btnGuardar" está definido en la solicitud POST

        // Se asignan los valores de los campos del formulario al modelo de cliente
        $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']);
        $this->modeloU->__SET('documento', $_POST['txtDocumento']);
        $this->modeloU->__SET('nombres', $_POST['txtNombres']);
        $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
        $this->modeloU->__SET('fechaNacimiento', $_POST['txtFechaNacimiento']);
        $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
        $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
        $this->modeloU->__SET('email', $_POST['txtEmail']);

        // Se registra la persona utilizando el modelo y se obtiene el resultado
        $persona = $this->modeloU->registrarPersona();

        if($persona == true){
            // Si el registro de la persona fue exitoso, se obtiene el último ID insertado
            $ultimoId = $this->modeloU->ultimoIdPersona();
            foreach($ultimoId as $value){
                $ultimoIdValue = $value['ultimoIdPersona'];
            }
        }
        // Se asigna el último ID insertado y el campo de descripción a las propiedades del modelo
            $this->modeloU->__SET('idPersona', $ultimoIdValue);
            $this->modeloU->__SET('descripcion', $_POST['txtDescripcion']);
            
            
            // Se registra el cliente en la base de datos
            $cliente = $this->modeloU->registrarCliente();
            // Si tanto el registro de la persona como el registro del cliente fueron exitosos,
            // se establece un mensaje de éxito en la sesión y se redirecciona al usuario
            if($persona == true && $cliente == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/registrarCliente");
                    exit();
            }else{
                // Si alguno de los registros falla, se establece un mensaje de error en la sesión y se redirecciona al usuario
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/registrarCliente");
                    exit();
            }
        }
        // Se obtiene la lista de tipos de documentos del modelo
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        // Se incluyen los archivos de plantilla necesarios para mostrar la vista
        require APP. 'view/_templates/header.php';
        require APP. 'view/cliente/crearCliente.php';
        require APP. 'view/_templates/footer.php';
    }

    public function listarClientes(){
        if(isset($_POST['btnEditar'])){
            $this -> modeloU -> __SET('idTipoDocumento', $_POST['selTipoDocumento']); #si hay un error puede estra aqui, selTiposDocumentos
            $this -> modeloU -> __SET('documento', $_POST['txtDocumento']);
            $this -> modeloU -> __SET('nombres', $_POST['txtNombres']);
            $this -> modeloU -> __SET('apellidos', $_POST['txtApellidos']);
            $this -> modeloU -> __SET('telefono', $_POST['txtTelefono']);
            $this -> modeloU -> __SET('direccion', $_POST['txtDireccion']);
            $this -> modeloU -> __SET('email', $_POST['txtEmail']);
            $this -> modeloU -> __SET('descripcion', $_POST['txtDescripcion']);
            $this -> modeloU -> __SET('idCliente', $_POST['txtIdCliente']);

            $update = $this->modeloU->modificarCliente();

            if($update == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Actualizacion Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/listarClientes");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/listarClientes");
                    exit();
            }
        }
        $cliente = $this->modeloU->listarCliente();
        $tipoCliente = $this->modeloU->listarTipoCliente();
        $tiposDocumentos = $this->modeloU->listarTipoDocumento();

        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/listarCliente.php';
        require APP . 'view/_templates/footer.php';
    }
    public function listarClientes(){
        if(isset($_POST['btnEditar'])){
            // Se obtienen los datos del formulario de edición de cliente
            $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']);
            $this->modeloU->__SET('documento', $_POST['txtDocumento']);
            $this->modeloU->__SET('nombres', $_POST['txtNombres']);
            $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
            $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloU->__SET('email', $_POST['txtEmail']);
            $this->modeloU->__SET('descripcion', $_POST['txtDescripcion']);
            $this->modeloU->__SET('idCliente', $_POST['txtIdCliente']);
    
            // Se llama al método del modelo para modificar el cliente
            $update = $this->modeloU->modificarCliente();
    
            if($update == true){
                // Se muestra un mensaje de éxito en caso de que la actualización sea exitosa
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Actualización Exitosa',
                    showConfirmButton: false,
                    timer: 1500})";
    
                // Se redirige a la página de listar clientes
                header("Location: ".URL."clienteController/listarClientes");
                exit();
            }else{
                // Se muestra un mensaje de error en caso de que ocurra un error durante la actualización
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrió un Error',
                    showConfirmButton: false,
                    timer: 1500})";
    
                // Se redirige a la página de listar clientes
                header("Location: ".URL."clienteController/listarClientes");
                exit();
            }
        }
    
        // Se obtienen los datos necesarios para mostrar la lista de clientes
        $cliente = $this->modeloU->listarCliente();
        $tipoCliente = $this->modeloU->listarTipoCliente();
        $tiposDocumentos = $this->modeloU->listarTipoDocumento();
    
        // Se incluyen los archivos de plantilla para el encabezado, la vista `listarCliente.php` y el pie de página
        require APP . 'view/_templates/header.php';
        require APP . 'view/cliente/listarCliente.php';
        require APP . 'view/_templates/footer.php';
    }
    

    public function datoCliente(){
        // Se obtiene el cliente por su ID mediante el método del modelo
        $cliente = $this->modeloU->ClienteId($_POST['id']);
        // Se devuelve el cliente en formato JSON
        echo json_encode($cliente);
    }
    
    public function cambiarEstado(){
        // Se cambia el estado del cliente mediante el método del modelo
        $estado = $this->modeloU->cambiarEstado($_POST['id']);
        // Se devuelve un valor numérico (1) como respuesta
        echo 1;
    }
    
    public function eliminarCliente(){
        // Se elimina el cliente mediante el método del modelo
        $estado = $this->modeloU->eliminarCliente($_POST['id']);
        // Se devuelve un valor numérico (1) como respuesta
        echo 1;
    }
    
}







?>