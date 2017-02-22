<?php
require_once 'Modelo.inc.php';
require_once 'Usuario.php';

class UsuarioModelo extends Modelo
{
    public function __construct(){
        parent::__construct('users');
    }

    /* Hace una consulta específica para ver el 
     * historial de compras del usuario.
     * Los produtos que compró y el monto total de la 
     * compra.
     */
    public function historico($u){
        //$this->query(consulta, All);        
    }

    /* Da de alta un usurio
     */
    public function alta($u){
        /*
           $datos = ['usern' => $u->username
           ,'nombre' => $u->nombre
           ,'apellidop' => $u->aPaterno
           ,'apellidom' => $u->aMaterno
           ,'correo' => $u->correo
           ,'constraseña' => hash('sha256', $u->password)
           ,'rol' => $u->rol];
         */
        $datos = ['username' => $u['usern']
                 ,'name' => $u['nombre']
                 ,'apaterno' => $u['apat']
                 ,'amaterno' => $u['amat']
                 ,'email' => $u['correo']
                 ,'pass' => hash('sha256', $u['pass'])
                 ,'admin' => $u['rol']];
        $this->insert($datos);
        return true;
    }

    /* Registra un producto en el carrito
     * de un usuario 
     */
    public function agregaACarrito($id_user, $id_prod){
        $query = "insert into carrito(id_product, id_user) 
                  values ($id_prod, $id_user)";
        return $this->query($query, ALL);
    }

    /* Borra un producto en el carrito
     * de un usuario 
     */
    public function borraDeCarrito($id_user, $id_prod){
        $query = "delete from carrito 
                  where id_user = $id_user 
                  and id_product = $id_prod;";
        return $this->query($query, ALL);
    }


    /* Vacía el carrito un usuario
     */
    public function vaciaCarrito($id_user){
        $query = "delete from carrito where id_user = $id_user;";
        return $this->query($query, ALL);
    }

    /* Compra todo lo de carrito
     */
    public function comprar($id_user){
        $query1 = "insert into ventas(id_user) values($id_user) RETURNING id;";
        $venta =  $this->query($query1, ASSOC)['id'];
        $query2 = "insert into venta_producto(id_product,id_venta) 
                     select $venta, id_product from carrito";
        $this->query($query2, ALL);
        $this->VacíaCarrito($id_user);
    }

    /* Muestra factura de última compra
     * contidad nombre_producto precio
     */
    public function muestraFactura($id_user){
        $query = "select distinct d.id, 
                                v.id_product, v.id_venta, 
                                d.name, d.description, d.price, 
                                total_producto.price as total, total_producto.num_productos
                 from venta_producto as v, 
                       products as p, 
                       descripcion_producto as d,
                       (
                               select sum(d.price) as price, count(d.price) as num_productos
                               from venta_producto as v, products as p, descripcion_producto as d
                               where v.id_product = p.id
                               and p.producto = d.id
                               group by(d.id)
                       ) as total_producto
               where v.id_product = p.id
               and p.producto = d.id;";
        return $this->query($query, ALL);
    }
    
    



}

