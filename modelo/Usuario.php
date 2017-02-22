<?php

class Usuario
{
    private $nombre;
    private $aPaterno;
    private $aMaterno;
    private $username;
    private $password;
    private $correo;
    private $rol;

    public function __constructor($datos){
        print_r($datos);
        echo "ctpm";
        $this->username = $datos['usern'];
        $this->nombre = $datos['nombre'];
        $this->aPaterno = $datos['apat'];
        $this->aMaterno = $datos['amat'];
        $this->password = $datos['pass'];
        $this->correo = $datos['mail'];
        $this->role = $datos['rol'];
    }
    
    /* Métodos SET */
    /* Métodos GET */

    public function getNombre(){
        return $this->nombre;
    }

    public function getAPaterno(){
        return $this->aPaterno;
    }
    
    public function getAMaterno(){
        return $this->aMaterno;
    }
    
    public function getNombreCompleto(){
        $n = $this->nombre;
        $n .= ' '.$this->aPaterno;
        $n .= ' '.$this->aMaterno;
        return $n;
    }
    
    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($c){
        $this->correo = $c;
    }
    
    public function setRol($rol){
        $this->rol = $rol;
    }
    
    public function setPassword(string $pass){
        $this->password = $pass;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }
    
    public function setAPaterno(string $aP){
        $this->aPaterno = $aP;
    }
    
    public function setAMaterno(string $aM){
        $this->aMaterno = $aM;
    }
}
