<?php
/**
 * Created by PhpStorm.
 * User: ariel
 * Date: 8/nov/2018
 * Time: 11:36
 */

class Admin extends  Conferencias
{
    public function verificaEstadoinscripcion($idinscripcion)
    {
        $inscripcionEstado = new AbmInscripcionestado();
        $param = ['idinscripcion' => $idinscripcion];
        $arregloinscripcionEstadoDeLainscripcion = $inscripcionEstado->buscar($param);
        $total = count($arregloinscripcionEstadoDeLainscripcion);

        $idEstadoinscripcion = $arregloinscripcionEstadoDeLainscripcion[$total - 1]->getObjinscripcionestadotipo()->getidinscripcionestadotipo();
        return $idEstadoinscripcion;

    }

    public function inscripcionsPendientes()
    {
        /*$inscripcionEstado=new AbmInscripcionestado();
        $param=['idinscripcionestadotipo'=>3];
        $arregloinscripcions=$inscripcionEstado->buscar($param);

        $inscripcionsPendientes=[];
        foreach($arregloinscripcions as $inscripcion){
            $inscripcionsPendientes[]=$inscripcion->getObjinscripcion();
        }*/
        $inscripcion = new AbmInscripcion();
        $arregloinscripcions = $inscripcion->buscar(null);

        return $arregloinscripcions;
        //return $inscripcionsPendientes;

    }

    //funcion para aceptar la inscripcion, el nuevo estado de la inscripcion se debe guardar con id 3
    public function aceptarinscripcion($idinscripcion)
    {
        $estado = false;
        //aca usamos la funcion para cambiarestado implementada en la clase Conferencias
        if ($this->cambiarEstadoinscripcion($idinscripcion, 2)) {
            $estado = true;

        }

        return $estado;


    }

    public function cancelarinscripcion($idinscripcion)
    {
        $estado = false;
        if ($this->cambiarEstadoinscripcion($idinscripcion, 4)) {
            $estado = true;
        }

        return $estado;
    }

}

