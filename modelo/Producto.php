<?php

class Producto
{

    /** Tabla Categoria
     * - id : 1 
     * - nombre: kdf3mmdmf 

     * Productos
     * - id : 1
     * - nombre: laptop
     * - id_categoria: 1
     */
    
    private $id;
    private $nombre;
    private $descripcion;
    private $costo;
    private $codigo

    /* Métodos SET */
    /* Métodos GET */

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function getCosto(){
        return $this->costo;
    }
        
    public function getCodigo(){
        return $this->codigo;
    }
            
    public function setId( $t){
        $this->id= $t;
    }

    public function setNombre($a){
        $this->nombre = $a;
    }
    
    public function setDescripcion( $g){
        $this->descripcion = $g;
    }
    
    public function setCosto( $i){
        $this->costo = $i;
    }
    
    public function setCodigo( $a){
        $this->codigo = $a;
    }
}
