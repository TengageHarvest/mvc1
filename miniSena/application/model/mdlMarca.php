<?php
//Crear la clase
class mdlMarca{

    //atributos
    public $idMarcas;
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

    public function crearMarca(){
        //definir la variable que guarda la consulta
        $sql="INSERT INTO marcas(Nombre, Descripcion) VALUES (?,?)";
        //crear la variable para enviar los datos
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->Nombre);
        $stm->bindParam(2, $this->Descripcion);
        return $stm->execute();
    }

    public function listarMarca(){
        //definir la variable de la consulta
        $sql="SELECT * FROM marcas ORDER BY idMarca ASC";

        //crear la variable que pide los datos
        $stm = $this->db->prepare($sql);
        $stm->execute();

        //dar la respuesta
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarMarca(){
        //definir la variable que guarda la consulta
        $sql="UPDATE marcas SET Nombre=?, Descripcion=? WHERE idMarca=?";
        //Crear ka variable para enviar los datos
        $stm= $this->db->prepare($sql);
        $stm->bindParam(1, $this->Nombre);
        $stm->bindParam(2, $this->Descripcion);
        $stm->bindParam(2, $this->idMarca);
        return $stm->execute();


    }

}
?>