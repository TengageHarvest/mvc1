<?php
//crear la clase principal
class mdlPersona{

    //crear los atributos necesarios
    public $idPersona;
    public $documento;
    public $idTipoDocumento;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $direccion;
    public $email;
    public $fechaNacimiento;
    public $db;

    //crear para fijar datos
    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }

    //crear método para pedir los datos
    public function __GET($atributo){
        return $this->$atributo;
    }

    //conectamos el modelo a la base de datos
    public function __construct($db){
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit("Error al conectar a la base de datos");
        }
    }

    //método para registrar personas
    public function registrarPersona(){
        //variable que guarda la consulta para el registro
        $sql = "INSERT INTO personas(Documento, Nombres, Apellidos, Email, Telefono, Direccion, Fecha_Nacimiento, idTipoDocumento) VALUES(?,?,?,?,?,?,?,?)";

        //crear variable para preparar la consulta
        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->documento);
        $stm -> bindParam(2, $this->nombres);
        $stm -> bindParam(3, $this->apellidos);
        $stm -> bindParam(4, $this->email);
        $stm -> bindParam(5, $this->telefono);
        $stm -> bindParam(6, $this->direccion);
        $stm -> bindParam(7, $this->fechaNacimiento);
        $stm -> bindParam(8, $this->idTipoDocumento);
        $resultado = $stm->execute();
        return $resultado;
    }

    //funcion para retornar el id de la última persona registrada
    public function ultimoIdPersona(){
        $sql = "SELECT MAX(idPersona) AS ultimoIdPersona FROM personas";
        $query = $this->db->prepare($sql);
        $query->execute();
        $ultimoId = $query->fetchAll(PDO::FETCH_ASSOC);
        return $ultimoId;
    }

    public function listarTipoDocumento(){
        $sql = "SELECT idTipoDocumento, Descripcion AS doc FROM tipodocumentos";
        $query = $this->db->prepare($sql);
        $query->execute();
        $doc = $query->fetchAll(PDO::FETCH_ASSOC);
        return $doc;
    }
}
?>