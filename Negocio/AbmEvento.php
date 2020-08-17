<?php 
class AbmEvento{

    /**s
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object evento
     */
        private function cargarObjeto($param){
            $objevento = null;

            if( array_key_exists('idevento',$param) and array_key_exists('nombre',$param) and array_key_exists('cantentrada',$param) and array_key_exists('importe',$param)){
                $objevento = new evento();

                $objevento->setear($param['idevento'], $param['nombre'], $param['detalle'], $param['cantentrada'],$param['importe'],$param['imagen']);
            }
            return $objevento;
        }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object evento
     */
    public function cargarObjetoConClave($param){
        $objevento = null;
        
        if( isset($param['idevento']) ){
            $objevento = new evento();
            //$objevento->setear($param['idevento'], "", "", "", "");
            $objevento->setidevento($param['idevento']);
           // $objevento->cargar();
        }
        return $objevento;
    }
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idevento']))
            $resp = true;
            return $resp;
    }
    
    /**
     * Permite crear un objeto
     * @param array $param
     * @return boolean
     */
    public function alta($param){
        $resp = false;
        $param['idevento']=null;
        $elObjtevento = $this->cargarObjeto($param);
        if ($elObjtevento!=null and $elObjtevento->insertar()){
            if ($_FILES['miArchivo'] != null){
                $listaProd = array();
                $listaProd = $this -> buscar($param);
                $cant = count($listaProd);
                $prod = $listaProd[$cant - 1];
                $param['idevento'] = $prod -> getidevento();
                $nombreProd = $prod -> getidevento().".jpg";
                $pudeSubirArchivo = subirArchivo($param,$nombreProd);

                if($pudeSubirArchivo) {
                    $param['imagen'] = "/Arquitectura/proyecto/Imagenes/" . $nombreProd;
                    $prod = $this -> modificacion($param);

                }
            }
            $resp = true;
        }
        return $resp;
    }
    
    /**
     * Permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtevento = $this->cargarObjetoConClave($param);
            if ($elObjtevento!=null and $elObjtevento->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * Permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtevento = $this->cargarObjeto($param);
            if($elObjtevento!=null and $elObjtevento->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * Permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idevento']))
                $where.=" and idevento =".$param['idevento'];
            if  (isset($param['nombre']))
                $where.=" and nombre ='".$param['nombre']."'";
            if  (isset($param['detalle']))
                $where.=" and detalle ='".$param['detalle']."'";
            if  (isset($param['cantentrada']))
                $where.=" and cantentrada =".$param['cantentrada'];
            if  (isset($param['importe']))
                $where.=" and importe =".$param['importe'];
            if  (isset($param['imagen']))
                $where.=" and imagen ='".$param['imagen']."'";
        }
        $arreglo = evento::listar($where);
        return $arreglo;      
    }
    
}
?>