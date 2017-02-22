<?php
require_once 'Modelo.inc.php';

class UsuarioModelo extends Modelo
{
    public function __construct(){
        parent::__construct('usuario');
    }

    /* Hace una consulta específica para ver el 
     * historial de compras del usuario.
     * Los produtos que compró y el monto total de la 
     * compra.
     */
    public function historico(Usuario $u):array{
        //$this->query(consulta, All);        
    }

    /* Da de alta un usurio
     */
    public function alta(Usuario $u):bool{
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

    /* Registra un producto en el carrito
     * de un usuario 
     */
    public function agregaACarrito($id_user){
        $query = "";
        return $this->query($query, ALL);
    }

    /* Borra un producto en el carrito
     * de un usuario 
     */
    public function borraDeCarrito($id_user){
        $query = "";
        return $this->query($query, ALL);
    }


    /* Vacía el carrito un usuario
     */
    public function vaciaCarrito($id_user){
        $query = "";
        return $this->query($query, ALL);
    }

    /* Compra todo lo de carrito
     */
    public function comprar($id_user){
        $query = "";
        return $this->query($query, ALL);
    }

    /* Muestra factura de última compra
     * contidad nombre_producto precio
     */
    public function muestraFactura($id_user){
        $query = "";
        return $this->query($query, ALL);
    }
    
    



}

