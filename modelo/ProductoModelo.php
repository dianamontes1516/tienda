<?php
require_once 'Modelo.inc.php';

class ProductoModelo extends Modelo
{

    public function __construct(){
        parent::__construct('inventario');
    }

    /* Hace una consulta para devolver todos los producto 
     * que hay y disponiblidad
     */
    public function todos(){
        return $this->all();
    }

    /* Dado el código  de un  producto quiero
     * saber cuantas existencias hay
     */
    public function existencia($id){
        return $this->base->select('inventario',$id);        
    }

    /* Da de alta un producto nuevo
     */
    public function alta($u):bool{
        $datos = ['username' => $u->username
                 ,'nombre' => $u->nombre
                 ,'apellidop' => $u->aPaterno
                 ,'apellidom' => $u->aMaterno
                 ,'correo' => $u->correo
                 ,'constraseña' => hash('sha256', $u->password)
                 ,'rol' => $u->rol];
        $this->insert($datos);
        return true;
    }

    /* Edita los valores de un producto
     * ya existente en la base.
     */
    public function edita(){


    }
    
}
