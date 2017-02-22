<?php
//$ruta = '/home/dmontes/Documents/CSC/inter0616/DesarrolloWebPHP/D11';
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
