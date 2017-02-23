<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/controlador/UsuarioControlador.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/controlador/ProductoControlador.php'; 
session_name('Tienda');
session_start();
return routeRequest();

function routeRequest()
{
    $uri = $_SERVER['REQUEST_URI'];
    
    if (preg_match("/^\/Tienda(\/index|\/)?$/", $uri)){
        echo file_get_contents('./vista/index.php');

    } elseif (preg_match('/^\/Tienda\/consultor\/[\s\S]+/', $uri)) {
        $valores = explode('/',$uri);
        switch($valores[3]){
            case 'catalogo':
                require_once($_SERVER['DOCUMENT_ROOT'].'/vista/consultor/catalogo.php');        
                break;
            case 'alta':
                echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/consultor/alta.php');        
                break;
            case 'login':
                if(isset($_SESSION['username_u'])){
                    echo 'Ya estás in';
                }else{
                    echo file_get_contents('./vista/login.php');
                }        
                break;
            default:  
                header("Location:/Tienda");
                break;
        }        
    } elseif (preg_match("/Tienda\/usuario\/[\s\S]+$/", $uri)){
        if(isset($_SESSION['username_u']) and $_SESSION['rol'] == 'usuario'){
            $valores = explode('/',$uri);
            switch($valores[3]){
                case 'inicio':
                    require_once($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/index.php');                     
                    break;
                case 'carrito':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/carrito.php');
                    break;
                case 'comprar':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/compra.php');
                    break;
                case 'agregar':
                    require_once($_SERVER['DOCUMENT_ROOT'].'/vista/usuario/agregar.php');
                    break;
                default:  
                    header("Location:/Tienda/usuario/inicio");
                    break;
            }
        }else{
            require_once($_SERVER['DOCUMENT_ROOT']."/vista/error/nosesion.php");
        }        
    } elseif (preg_match("/Tienda\/admin\/[\s\S]+$/", $uri)){
        if(isset($_SESSION['username_u']) and $_SESSION['rol'] == 'admin'){
            $valores = explode('/',$uri);
            switch($valores[3]){
                case 'inicio':
                    echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vista/admin/index.php');        
                    break;
                case 'altaProducto':
                    break;
                case 'editaProducto':
                    break;
                default:  
                    header("Location:/Tienda/admin/inicio");
                    break;
            }
        }else{
            require_once($_SERVER['DOCUMENT_ROOT']."/vista/error/nosesion.php");
        }        
    } elseif (preg_match("/Tienda\/exit/", $uri)){
        echo "Hasta luego ".$_SESSION['username_u'];
	session_unset();
	session_destroy();
        header("Location:/Tienda");
    } elseif (preg_match("/Tienda\/controlador\/consultor\/[\s\S]+$/", $uri)){
        $valores = explode('/',$uri);        
        switch($valores[4]){
            case 'login':
                $u = new UsuarioControlador();                
                $resp = $u->login($_POST['usern'],$_POST['pass']);
                if($resp){ //ejemplo simple, sólo un usuario logeado
                    header("Location:/Tienda/usuario/inicio");
                }else{
                    echo file_get_contents('./vista/login.php');
                }
                break;
            case 'alta':
                $u = new UsuarioControlador();                
                
                $resp = $u->alta($_POST);
                if($resp){ //ejemplo simple, sólo un usuario logeado
                    $_SESSION['usuario_u']=$_POST['usern'];
                    $_SESSION['nombre_u']=$_POST['nombre'];
                    $_SESSION['rol']=$info->rol == 'true'? 'admin' : 'usuario';
                    header("Location:/Tienda/usuario/inicio");
                }else{
                    require_once($_SERVER['DOCUMENT_ROOT'].'/vista/consultor/alta.php');        
                }
                break;
            default:  
                header("Location:/Tienda");
                break;
        }
    } elseif (preg_match("/Tienda\/controlador\/usuario\/[\s\S]+$/", $uri)){
        $valores = explode('/',$uri);
        if(isset($_SESSION['username_u'])){
            switch($valores[4]){
                case 'login':
                    break;
                case 'agrega':
                    $u = new UsuarioControlador();
                    $u->agregarACarrito($_SESSION['username_u'],$_POST['producto']);
                    
                    break;
                default:  
                    header("Location:/Tienda");
                    break;
            }
        }
    } elseif (preg_match("/\/vista\/js\/[\s\S]*.js/", $uri)){
        echo file_get_contents($_SERVER['DOCUMENT_ROOT'].$uri);        
    }else { 
        require_once($_SERVER['DOCUMENT_ROOT']."/vista/error/notfound.php");

   }
}

