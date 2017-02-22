<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/controlador/UsuarioControlador.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/controlador/ProductoControlador.php'; 
session_name('Tienda');
session_start();
return routeRequest();

//$uri == '/Biblio/usuarioValido'

function routeRequest()
{
    $uri = $_SERVER['REQUEST_URI'];
    
    if (preg_match("/^\/Tienda(\/index|\/)?$/", $uri)){
        echo file_get_contents('./vista/index.php');

    } elseif (preg_match('/^\/Tienda\/consultor\/[\s\S]+/', $uri)) {
        $valores = explode('/',$uri);
        switch($valores[3]){
            case 'catalogo':
                $c = new ProductoControlador();
                print_r($c->catalogo()); 
                //echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/consultor/.php');        
                break;
            case 'alta':
                echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/consultor/alta.php');        
                break;
            case 'historial':
                break;
            default:  
                header("Location:/Tienda");
                break;
        }        
    } elseif (preg_match("/Tienda\/login(\/)?$/", $uri)){
        if(isset($_SESSION['id_u'])){
            echo 'Ya estás in';
        }else{
            echo file_get_contents('./vista/login.php');
        }        
    } elseif (preg_match("/Tienda\/usuario\/[\s\S]+$/", $uri)){
        if(isset($_SESSION['id_u'])){
            $valores = explode('/',$uri);
            switch($valores[3]){
            case 'inicio':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/index.php');        
                echo "Hola";
                break;
            case 'carrito':
                break;
            case 'historial':
                break;
            default:  
                header("Location:/Tienda");
                break;
            }
        }else{
            header("Location:/Tienda/login");
         }        
    } elseif (preg_match("/Tienda\/producto\/[\s\S]+$/", $uri)){
        if(isset($_SESSION['id_u'])){
            $valores = explode('/',$uri);
            switch($valores[3]){
                case 'c':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/index.php');        
                    echo "Hola";
                    break;
                case 'carrito':
                    break;
                case 'historial':
                    break;
                default:  
                    header("Location:/Tienda");
                    break;
            }
        }else{
            header("Location:/Tienda/login");
        }        
    } elseif (preg_match("/Tienda\/admin\/[\s\S]+$/", $uri)){
        if(isset($_SESSION['id_u'])){
            $valores = explode('/',$uri);
            switch($valores[3]){
                case 'inicio':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/admin/index.php');        
                    echo "Hola";
                    break;
                case 'altaAdmin':
                    break;
                case 'altaProducto':
                    break;
                default:  
                    header("Location:/Tienda");
                    break;
            }
        }else{
            header("Location:/Tienda/login");
        }        
    } elseif (preg_match("/Tienda\/exit/", $uri)){
        echo "Hasta luego ".$_SESSION['id_u'];
		session_unset();
		session_destroy();
        
    } elseif (preg_match("/Tienda\/controlador\/[\s\S]+$/", $uri)){
            $valores = explode('/',$uri);        
            switch($valores[3]){
            case 'login':
                $u = new UsuarioControlador();                
                $resp = $u->login($_POST['username'],$_POST['pass']);
                if($resp){ //ejemplo simple, sólo un usuario logeado
                    $_SESSION['id_u']=$_POST['username'];
                    die(json_encode(['status'=>200, 'message'=> 'bien']));
                }else{
                    die(json_encode(['status'=>400, 'message'=> 'Credenciales inválidas.']));
                }
                break;
            case 'actuales':
                break;
            case 'renovacion':
                break;
            case 'multas':
                break;
            case 'historial':
                break;
            default:  
                header("Location:/Tienda");
                break;
            }
    } elseif (preg_match("/\/vista\/js\/[\s\S]*.js/", $uri)){
        echo file_get_contents($_SERVER['DOCUMENT_ROOT'].$uri);        
    }else {
        echo "Lo sentimos no podemos atender tu peticion.";
    }
}

