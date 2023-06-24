<?php
//Crear la clase
class mdlCategoria {

    //atributos
    public $idCategoria;
    public $Nombre;
    public $Descripcion;
    public $db;
    //El constructor se encarga de la conexion

    function __construct($db){
        $this->db = $db;
    }

    //creamos los métodos de fijar y obtener datos

    public function __SET($atributo, $valor){
        $this->atributo =$valor;
    }

    public function __GET($atributo){
        return $this->$atributo;
    }

    //método para crear

    public function crearCategoria(){
        //definir la variable que guarda la consulta
        $sql="INSERT INTO categoria(Nombre, Descripcion) VALUES (?,?)";
        //crear la variable para enviar los datos
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->Nombre);
        $stm->bindParam(2, $this->Descripcion);
        return $stm->execute();
    }

    public function listarCategoria(){
        //definir la variable de la consulta
        $sql="SELECT * FROM categoria ORDER BY idCategoria ASC";

        //crear la variable que pide los datos
        $stm = $this->db->prepare($sql);
        $stm->execute();

        //dar la respuesta
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarCategoria(){
        //definir la variable que guarda la consulta
        $sql="UPDATE categoria SET Nombre=?, Descripcion=? WHERE idCategoria=?";
        //Crear ka variable para enviar los datos
        $stm= $this->db->prepare($sql);
        $stm->bindParam(1, $this->Nombre);
        $stm->bindParam(2, $this->Descripcion);
        $stm->bindParam(2, $this->idCategoria);
        return $stm->execute();


    }

}
?>