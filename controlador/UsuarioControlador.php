<?php
$ruta = $_SERVER['DOCUMENT_ROOT'];
require_once($ruta.'/modelo/UsuarioModelo.php');
require_once($ruta.'/controlador/Validator.php');

class UsuarioControlador
{

    private $usuarioM;
    private $prestamoM;
    private $libroM;
    
    public function __construct(){
        $this->usuarioM = new UsuarioModelo();
    }

    /* Alta de un usuario normal
     */
    public function alta($datos){
        if(strcmp($datos['pass'] , $datos['passC'])){
            echo "<li> Las constraseñas no coinciden";
            return false;
        }
        unset($datos['passC']);
        $validation=Validator::validate($datos,
                                        ['nombre' => ['required','nombre'],
                                         'apat' => ['required','nombre'],
                                         'amat' => ['required','nombre'],
                                         'usern' => ['required','alphanumeric'],
                                         'pass' => ['required','texto'],
                                         'mail' => ['required','mail']]);

        if($validation != false){
            echo $validation;
            return false;
        }
        /*
        $u = new Usuario($datos);
        print_r($u);
        $u->setRol("false"); //no admin
         */
        $datos['rol'] = 'false';
        $info = $this->usuarioM->find($datos['usern'],'username');
        if(isset($info->username) === true){
            echo "Usuario ya registrado";
            return false;
        }
        return $this->usuarioM->alta($datos); 
    }

    /* $pass en texto plano
     */
    public function login($id, $pass){
        $info = $this->usuarioM->find($id,'username');
        if(isset($info->username) === false){
            return false;
        }
        if(hash('sha256',$pass) === $info->pass){
            return true;
        }
        echo "No ha podido ser autenticado";
        return false;        
    }

    public function info($id){
        return $this->usuarioM->find($id,'username');
    }
    
     /* Como usuario quiero ver mis préstamos activos.
     */
    public function carritoCompras($id_u){
        $usuario = $this->usuarioM->find($id,'username');
        if(isset($info->username) === false){
            echo "Usuario no encontrado";
            return false;
        }
        return $this->prestamoM->prestamos_activos($id_u);
    }


    public static function bienvenida(){
        $bienvenida = "Bienvenido a la biblioteca virtual del Yeliz.";
        return $bienvenida;
    }
    
}
/*
$uC = new UsuarioControlador();
var_dump($uC->login('fua2', 'fuasda2'));
*/
