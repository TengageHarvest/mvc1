<?php
//Heredar del modelo Principal si es necesario
require_once "mdlPersona.php";

//heredamos la clase
class mdlUsuario extends mdlPersona{
    private $idUsuario;
    private $usuario;
    private $clave;
    private $idRol;
    private $estado;

    //fijar datos
    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }

    //pedir datos
    public function __GET($atributo){
        return $this->$atributo;
    }

    public function validarUsuario(){
        // Consulta SQL para validar si el usuario existe
        $sql = "SELECT P.Documento, P.Nombres, P.Apellidos, U.Usuario, U.idUsuario, R.Descripcion FROM personas AS P INNER JOIN tipodocumentos AS TD
        ON P.idTipoDocumento = TD.idTipoDocumento
        INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Usuario = ? AND U.Clave = ? AND U.Estado = 1";
    
        // Se prepara la consulta
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario); // Se asigna el valor del usuario a la consulta (parámetro 1)
        $stm->bindParam(2, $this->clave); // Se asigna el valor de la clave a la consulta (parámetro 2)
        $stm->execute(); // Se ejecuta la consulta
        $user = $stm->fetch(PDO::FETCH_ASSOC); // Se obtiene la fila de resultado como un arreglo asociativo
        return $user; // Se devuelve el arreglo asociativo con los datos del usuario
    }
    

    //metodo para registrar usuarios
    public function registrarUsuario(){
        // Consulta SQL para insertar un nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios(idPersona, Usuario, Clave, idRol, Estado) VALUES (?, ?, ?, ?, ?)";
        
        // Estado del usuario (activo)
        $estado = 1;
    
        // Se prepara la consulta
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->idPersona); // Se asigna el valor del idPersona a la consulta (parámetro 1)
        $stm->bindParam(2, $this->usuario); // Se asigna el valor del usuario a la consulta (parámetro 2)
        $stm->bindParam(3, $this->clave); // Se asigna el valor de la clave a la consulta (parámetro 3)
        $stm->bindParam(4, $this->idRol); // Se asigna el valor del idRol a la consulta (parámetro 4)
        $stm->bindParam(5, $estado); // Se asigna el valor del estado a la consulta (parámetro 5)
        
        // Se ejecuta la consulta
        $result = $stm->execute();
        
        // Se devuelve el resultado de la ejecución (true si se insertó correctamente, false en caso contrario)
        return $result;
    }
    


# Método para listar usuarios
    public function listarUsuarios(){
        $sql = "SELECT P.idPersona, P.Documento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, P.Fecha_Nacimiento, U.Usuario, U.Estado, R.Descripcion, U.idUsuario FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol";
        
        # Preparar la consulta SQL
        $stm = $this->db->prepare($sql);
        
        # Ejecutar la consulta
        $stm -> execute();
        
        # Obtener todos los resultados de la consulta como un array asociativo
        $user = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        # Devolver los resultados
        return $user;
    }


    # Método para filtrar usuarios por ID
    public function usuarioId($id){
        $sql = "SELECT P.idPersona, P.Documento, P.idTipoDocumento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, U.Usuario, U.Estado, R.Descripcion, U.idUsuario, U.idRol FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol WHERE idUsuario = ?";
        
        # Preparar la consulta SQL
        $query = $this->db->prepare($sql);
        
        # Asociar el parámetro de ID al marcador de posición en la consulta
        $query->bindParam(1, $id);
        
        # Ejecutar la consulta
        $query->execute();
        
        # Obtener todos los resultados de la consulta como un array asociativo
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        # Devolver los resultados
        return $result;
    }

    # Método para listar roles
    public function listarRoles(){
        $sql = "SELECT idRol, Descripcion AS tipo FROM roles";
        
        # Preparar la consulta SQL
        $query = $this->db->prepare($sql);
        
        # Ejecutar la consulta
        $query->execute();
        
        # Obtener todos los resultados de la consulta como un array asociativo
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        # Devolver los resultados
        return $result;
    }

    # Método para cambiar el estado de un usuario
    public function cambiarEstado($id){
        $sql = "UPDATE usuarios SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idUsuario = ?";
        
        # Preparar la consulta SQL
        $query = $this->db->prepare($sql);
        
        # Asociar el parámetro de ID al marcador de posición en la consulta
        $query->bindParam(1, $id);
        
        # Ejecutar la consulta y devolver el resultado de la ejecución (true o false)
        return $query->execute();
    }

    # Método para eliminar usuarios
    public function eliminarUsuario($id){
        $sql = "DELETE u, p FROM usuarios AS u INNER JOIN personas AS p WHERE p.idPersona = u.idPersona AND u.idUsuario = ?";
        
        # Preparar la consulta SQL
        $query = $this->db->prepare($sql);
        
        # Asociar el parámetro de ID al marcador de posición en la consulta
        $query->bindParam(1, $id);
        
        # Ejecutar la consulta y devolver el resultado de la ejecución (true o false)
        return $query->execute();
    }


    # Método para modificar usuarios
    public function modificarUsuario(){
        $sql = "UPDATE personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona SET P.idTipoDocumento = ?, P.Documento = ?, P.Nombres = ?, P.Apellidos = ?, P.Telefono = ?, P.Direccion = ?, P.Email = ?, U.Usuario = ? WHERE U.idUsuario = ?";
        
        # Preparar la consulta SQL
        $stm = $this->db->prepare($sql);
        
        # Asociar los parámetros a los marcadores de posición en la consulta
        $stm->bindParam(1, $this->idTipoDocumento);
        $stm->bindParam(2, $this->documento);
        $stm->bindParam(3, $this->nombres);
        $stm->bindParam(4, $this->apellidos);
        $stm->bindParam(5, $this->telefono);
        $stm->bindParam(6, $this->direccion);
        $stm->bindParam(7, $this->email);
        $stm->bindParam(8, $this->usuario);
        /* $stm->bindParam(9, $this->idRol); */ // Este parámetro está comentado, no se utiliza en la consulta actual
        $stm->bindParam(9, $this->idUsuario);
        
        # Ejecutar la consulta y obtener el resultado de la ejecución (true o false)
        $result = $stm->execute();
        
        # Devolver el resultado
        return $result;
    }
}

?>