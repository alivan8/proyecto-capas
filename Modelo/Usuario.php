<?php 
class Usuario{
    
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;
    private $mensajeoperacion;
    
    public function __construct(){
        $this -> idusuario="";
        $this -> usnombre="";
        $this -> uspass="";
        $this -> usmail="";
        $this -> usdeshabilitado=NULL;
        $this -> mensajeoperacion="";
    }
    
    // Metodos de acceso GET
    
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getUsnombre()
    {
        return $this->usnombre;
    }

    public function getUspass()
    {
        return $this->uspass;
    }

    public function getUsmail()
    {
        return $this->usmail;
    }

    public function getUsdeshabilitado()
    {
        return $this->usdeshabilitado;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    // Metodos de acceso SET
    
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setUsnombre($usnombre)
    {
        $this->usnombre = $usnombre;
    }

    public function setUspass($uspass)
    {
        $this->uspass = $uspass;
    }

    public function setUsmail($usmail)
    {
        $this->usmail = $usmail;
    }

    public function setUsdeshabilitado($usdeshabilitado)
    {
        $this->usdeshabilitado = $usdeshabilitado;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado){
        $this -> idusuario=$idusuario;
        $this -> usnombre=$usnombre;
        $this -> uspass=$uspass;
        $this -> usmail=$usmail;
        $this -> usdeshabilitado=$usdeshabilitado;
    }
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->cargar: ".$base->getError()[2]);
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        if($this -> getUsdeshabilitado() != null){
            $sql="INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado)  VALUES('".$this -> getUsnombre()."','".$this -> getUspass()."','".$this -> getUsmail()."','".$this -> getUsdeshabilitado()."');";
        }else{
            $sql="INSERT INTO usuario(usnombre, uspass, usmail)  VALUES('".$this -> getUsnombre()."','".$this -> getUspass()."','".$this -> getUsmail()."');";
        }
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: ".$base->getError()[2]);
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: ".$base->getError()[2]);
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET usnombre='".$this->getUsnombre()."', uspass='".$this -> getUspass()."', usmail='".$this -> getUsmail()."'";
        if ($this -> getUsdeshabilitado() != null){
            $sql.=", usdeshabilitado='".$this -> getUsdeshabilitado()."'";

        }else{
            $sql.=", usdeshabilitado= NULL ";

        }
        $sql.=" WHERE idusuario =".$this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar 1: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar 2: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuario WHERE idusuario =".$this -> getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;

        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }
    
}
?>