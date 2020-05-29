<?php
class evento{
    
    private $idevento;
    private $nombre;
    private $detalle;
    private $cantentrada;
    private $importe;
    private $imagen;
    private $mensajeoperacion;
    
    public function __construct(){
        $this -> idevento="";
        $this -> nombre="";
        $this -> detalle="";
        $this -> cantentrada="";
        $this -> importe="";
        $this -> imagen="";
        $this -> mensajeoperacion="";
    }
    
    // Metodos de acceso GET
    
    public function getidevento()
    {
        return $this->idevento;
    }

    public function getnombre()
    {
        return $this->nombre;
    }

    public function getdetalle()
    {
        return $this->detalle;
    }

    public function getcantentrada()
    {
        return $this->cantentrada;
    }

    public function getimporte()
    {
        return $this->importe;
    }

    public function getimagen()
    {
        return $this->imagen;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    // Metodos de acceso SET
    
    public function setidevento($idevento)
    {
        $this->idevento = $idevento;
    }

    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setdetalle($detalle)
    {
        $this->detalle = $detalle;
    }

    public function setcantentrada($cantentrada)
    {
        $this->cantentrada = $cantentrada;
    }

    public function setimporte($importe)
    {
        $this->importe = $importe;
    }

    public function setimagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    public function setear($idevento, $nombre, $detalle, $cantentrada, $importe, $imagen){
        $this -> idevento=$idevento;
        $this -> nombre=$nombre;
        $this -> detalle=$detalle;
        $this -> cantentrada=$cantentrada;
        $this -> importe=$importe;
        $this -> imagen=$imagen;
    }
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM evento WHERE idevento = ".$this->getidevento();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){$row = $base->Registro();
                    $this->setear($row['idevento'], $row['nombre'], $row['detalle'], $row['cantentrada'], $row['importe'], $row['imagen']);
                }
            }
        } else {
            $this->setmensajeoperacion("evento->cargar: ".$base->getError()[2]);
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO evento(nombre, detalle, cantentrada, importe, imagen)  VALUES('".$this -> getnombre()."','".$this -> getdetalle()."','".$this -> getcantentrada()."','".$this -> getimporte()."','".$this -> getimagen()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidevento($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("evento->insertar: ".$base->getError()[2]);
            }
        } else {
            $this->setmensajeoperacion("evento->insertar: ".$base->getError()[2]);
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE evento SET nombre='".$this->getnombre()."', detalle='".$this -> getdetalle()."', cantentrada=".$this -> getcantentrada().", importe=".$this -> getimporte().", imagen='".$this -> getimagen()."' WHERE idevento =".$this->getidevento();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
                
            } else {
                $this->setmensajeoperacion("evento->modificar 1: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("evento->modificar 2: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM evento WHERE idevento =".$this -> getidevento();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("evento->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("evento->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM evento ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new evento();
                    $obj->setear($row['idevento'], $row['nombre'], $row['detalle'], $row['cantentrada'], $row['importe'], $row['imagen']);
                    array_push($arreglo, $obj);
                }              
            }         
        }        
        return $arreglo;
    }
}

?>