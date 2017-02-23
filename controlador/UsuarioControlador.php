<?php
$ruta = $_SERVER['DOCUMENT_ROOT'];
require_once($ruta.'/modelo/UsuarioModelo.php');
require_once($ruta.'/modelo/ProductoModelo.php');
require_once($ruta.'/controlador/Validator.php');

class UsuarioControlador
{

    private $usuarioM;
    private $prodM;
    
    public function __construct(){
        $this->usuarioM = new UsuarioModelo();
        $this->prodM = new ProductoModelo();
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
    public function login($username, $pass){
        $validation=Validator::validate(['usern'=> $username, 'pass' => $pass],
                                        ['usern' => ['required','alphanumeric'],
                                         'pass' => ['required','texto']]);

        if($validation != false){
            echo $validation;
            return false;
        }
        $info = $this->usuarioM->find($username,'username');
        if(isset($info->username) === false){
            return false;
        }
        if(hash('sha256',$pass) === $info->pass){
            session_start();
            $_SESSION['username_u']=$info->username;
            $_SESSION['nombre_u']=$info->name;
            return true;
        }
        echo "No ha podido ser autenticado";
        return false;        
    }

    public function info($id){
        return $this->usuarioM->find($id,'username');
    }
    
     /* Como usuario quiero ver mis cosas del carrito.
     */
    public function carritoCompras($id_u){
    }

    /* Como usuario quiero agregar un item a mi carrito
     * @param id_u - id del usuaio
     * @param id_p - id del producto, como generalidad
     */
    public function agregarACarrito($username, $id_p){
        $validation=Validator::validate(['user'=>$username
                                        ,'prod' =>$id_p]                                      
                                       ,['user' => ['required','alphanumeric'],
                                         'prod' => ['required','numero']]);

        $existencias = $this->prodM->existencia($id_p);

        if($existencias === 0){
            echo "No hay artículos suficientes.";
            return false;
        }
        
        $usuario = $this->usuarioM->find($username,'username');
        if(isset($info->username) === false){
            echo "Usuario no encontrado";
            return false;
        }
        return $this->usuarioM->agregaACarrito($id_u,$id_p);
    }
}
