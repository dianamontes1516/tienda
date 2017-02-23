<?php
    $ruta = $_SERVER['DOCUMENT_ROOT'];
    require_once($ruta.'/vista/menu.php');
    $u = new UsuarioControlador();
    print_r($u->carritoCompras($_SESSION['username_u']));
?>