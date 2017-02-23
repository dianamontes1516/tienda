<?php
$ruta = $_SERVER['DOCUMENT_ROOT'];
require_once($ruta.'/modelo/ProductoModelo.php');

class ProductoControlador
{

    private $productoM;
    
    public function __construct(){
        $this->productoM = new ProductoModelo();
    }

    /* Muestra: productos disponibles
     */
    public function catalogo(){
        return $this->productoM->todos();
    }

    public static function bienvenida(){
        $bienvenida= "Bienvendio a la sección de libros";
        return $bienvenida;
    }
    
}
